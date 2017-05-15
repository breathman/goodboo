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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Application();

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->register(new DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'pdo_sqlite',
		'path'     => __DIR__.'/app.db',
	),
));

$app['debug'] = true;

$app->get('/', function() use ($app) {
    return $app['twig']->render('hellow.html.twig', array(
    ));
});

$app->post('/message', function(Request $request) use ($app) {

	$message = array(
		'user_name' => $request->get('name'),
		'user_email' => $request->get('email'),
		'text_message' => $request->get('message'),
	);

	$app['db']->insert('message', $message);

	return new Response(200);
});

$app->post('/telegram/message', function(Request $request) use ($app) {

	$application  = json_decode($request->getContent());



	return new Response(json_encode($application));

});

$app->get('/telegram/messages', function() use($app) {

	$messages = $app['db']->fetchAll('message');

	return new Response(json_encode($messages));

});

$app->run();

