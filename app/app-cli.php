<?php

$app = require_once __DIR__ . '/app.php';

$console = new \Symfony\Component\Console\Application();

$app->register(new Kurl\Silex\Provider\DoctrineMigrationsProvider($console), array(
	'migrations.directory' => __DIR__.'/../migrations',
	'migrations.namespace' => 'Goodboo\Migrations',
));

$app->boot();

return $console;