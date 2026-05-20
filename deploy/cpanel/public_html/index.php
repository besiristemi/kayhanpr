<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| cPanel: Bu dosya public_html icinde olmali.
| Laravel govdesi: public_html ile AYNI SEVIYEDE kayhanpr klasoru
| Ornek: /home/kullanici/public_html/index.php (bu dosya)
|        /home/kullanici/kayhanpr/              (app, vendor, .env...)
|--------------------------------------------------------------------------
*/
$laravelRoot = dirname(__DIR__) . '/kayhanpr';

if (file_exists($maintenance = $laravelRoot . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $laravelRoot . '/vendor/autoload.php';

$app = require_once $laravelRoot . '/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
