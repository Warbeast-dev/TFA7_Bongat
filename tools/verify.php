<?php
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

require __DIR__.'/../vendor/autoload.php';
if (! extension_loaded('pdo_sqlite')) {
    fwrite(STDERR, "Enable pdo_sqlite in your local PHP configuration to run verification.\n");
    exit(1);
}
if (file_exists(__DIR__.'/../bootstrap/cache/config.php')) {
    fwrite(STDERR, "Remove bootstrap/cache/config.php locally before verification.\n");
    exit(1);
}
$database = tempnam(sys_get_temp_dir(), 'pos_verify_');
if ($database === false) {
    throw new RuntimeException('Could not create an isolated verification database.');
}
$settings = [
    'APP_ENV' => 'testing', 'APP_DEBUG' => 'false',
    'APP_KEY' => 'base64:'.base64_encode(random_bytes(32)),
    'APP_URL' => 'http://localhost', 'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $database, 'DB_URL' => '',
    'SESSION_DRIVER' => 'array', 'CACHE_STORE' => 'array',
];
foreach ($settings as $name => $value) {
    putenv($name.'='.$value);
    $_ENV[$name] = $_SERVER[$name] = $value;
}
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(ConsoleKernel::class)->bootstrap();
$checks = [];
function check(bool $condition, string $label): void
{
    global $checks;
    if (! $condition) {
        throw new RuntimeException($label);
    }
    $checks[] = $label;
    echo "PASS: $label\n";
}
function page(string $path, int $status = 200): string
{
    global $app;
    $kernel = $app->make(HttpKernel::class);
    $request = Request::create('http://localhost'.$path, 'GET');
    $response = $kernel->handle($request);
    check($response->getStatusCode() === $status, "$path returns HTTP $status");
    $content = $response->getContent();
    $kernel->terminate($request, $response);
    return $content;
}
try {
    check(Artisan::call('migrate', ['--force' => true]) === 0, 'Migrations run successfully');
    check(Artisan::call('db:seed', ['--force' => true]) === 0, 'Seeders run successfully');
    check(Customer::count() === 5 && User::count() === 5, 'Five customers and five users');
    Artisan::call('db:seed', ['--force' => true]);
    check(Customer::count() === 5 && User::count() === 5, 'Reseeding does not duplicate sample records');
    $duplicateRejected = false;
    try {
        User::create(['username' => 'msantos', 'full_name' => 'Duplicate']);
    } catch (QueryException $exception) {
        $duplicateRejected = true;
    }
    check($duplicateRejected, 'Duplicate usernames rejected by the database');
    page('/');
    page('/about');
    check(str_contains(page('/customers'), 'maria.santos@example.com'), 'Customer view displays database values');
    check(str_contains(page('/users'), 'msantos'), 'User view displays database values');
    check(str_contains(page('/customers/create'), 'name="full_name"'), 'Customer create form renders');
    check(str_contains(page('/customers/1/edit'), 'name="_method"'), 'Customer edit form renders');
    check(str_contains(page('/users/create'), 'name="username"'), 'User create form renders');
    check(str_contains(page('/users/1/edit'), 'name="avatar"'), 'User edit form renders avatar upload');
    page('/missing-page', 404);
    $customer = Customer::firstOrFail();
    $customer->update(['full_name' => '<script>alert(1)</script>']);
    $content = page('/customers');
    check(str_contains($content, '&lt;script&gt;alert(1)&lt;/script&gt;') && ! str_contains($content, '<script>alert(1)</script>'), 'Blade escapes stored HTML');
    Customer::query()->delete();
    User::query()->delete();
    check(str_contains(page('/customers'), 'No customers available yet.'), 'Customer empty state renders');
    check(str_contains(page('/users'), 'No users available yet.'), 'User empty state renders');
    check(Artisan::call('migrate:rollback', ['--force' => true]) === 0, 'Migrations roll back');
    check(Artisan::call('migrate', ['--force' => true]) === 0, 'Migrations run again after rollback');
    check(Artisan::call('db:seed', ['--force' => true]) === 0, 'Seeders run after rebuilding');
    file_put_contents(__DIR__.'/../storage/logs/verification.json', json_encode([
        'time_utc' => gmdate('c'), 'php' => PHP_VERSION,
        'laravel' => $app->version(), 'database' => 'isolated SQLite',
        'checks' => $checks, 'result' => 'passed',
        'not_tested' => ['InfinityFree live server', 'MySQL SQL import', 'Apache rewrite rules'],
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "All checks passed. Report: storage/logs/verification.json\n";
} catch (Throwable $exception) {
    fwrite(STDERR, "FAIL: ".$exception->getMessage()."\n");
    exit(1);
} finally {
    $app->make('db')->purge('sqlite');
    if (is_file($database)) {
        unlink($database);
    }
}
