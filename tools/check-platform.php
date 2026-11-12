<?php
if (PHP_VERSION_ID < 80200) {
    fwrite(STDERR, "PHP 8.2 or newer is required.\n");
    exit(1);
}
foreach (['ctype', 'curl', 'dom', 'fileinfo', 'filter', 'hash', 'mbstring', 'openssl', 'pcre', 'PDO', 'session', 'tokenizer', 'xml', 'pdo_mysql', 'pdo_sqlite'] as $extension) {
    if (! extension_loaded($extension)) {
        fwrite(STDERR, "Missing PHP extension: ".$extension.PHP_EOL);
        exit(1);
    }
}
echo "Local PHP requirements satisfied.\n";
