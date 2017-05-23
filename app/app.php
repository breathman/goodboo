<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 23.03.2017
 * Time: 17:48
 */

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$env = 'dev';
$config = require_once __DIR__ .'/'.$env.'_config.php';

$app = new Application();

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

$app->register(new DoctrineServiceProvider(), array(
	'dbs.options' => $config['dbs']
));

$app->register(new \Silex\Provider\MonologServiceProvider(), array(
	'monolog.logfile' => __DIR__.'/../logs/app.log',
	'monolog.level'   => $config['monolog']['level'],
));

$app['debug'] = $config['debug'];

return $app;

