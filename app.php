<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 23.03.2017
 * Time: 17:48
 */

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Application();

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app['debug'] = true;

/*$app->post('/application', function(Request $request) {
    $name = $request->get('name');
    $file = fopen('mss.txt', 'w');
    file_put_contents($file, $name);
    fclose($file);
    return Response::HTTP_OK;
});*/

$app->get('/', function() use ($app) {
    return $app['twig']->render('hellow.html.twig', array(
    ));
});

$app->run();

