<?php
if (PHP_SAPI !== 'cli' || $argc !== 2) {
    exit(1);
}
$directory = realpath($argv[1]);
if ($directory === false || ! is_file($directory.'/.env.example')) {
    fwrite(STDERR, "Missing staged environment template.\n");
    exit(1);
}
$template = file_get_contents($directory.'/.env.example');
$key = 'base64:'.base64_encode(random_bytes(32));
$content = str_replace('APP_KEY=', 'APP_KEY='.$key, $template);
if (file_put_contents($directory.'/.env', $content) === false) {
    exit(1);
}
