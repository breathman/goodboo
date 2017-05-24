<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = require_once __DIR__.'/app.php';

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

	$app['logger']->info(sprintf('Пришло сообщение с сайта %s', var_export($message, true)));

	$app['db']->insert('message', $message);

	return new Response(200);
});

$app->post('/telegram/message', function(Request $request) use ($app) {

	$application  = json_decode($request->getContent());

	return new Response(json_encode($application));

});

$app->get('/telegram/messages', function() use($app) {

	/** @var  $qm \Doctrine\DBAL\Query\QueryBuilder */
	$qm  = $app['db']->createQueryBuilder();

	$messages = $qm ->select('*')
					->from('message')
					->execute()
					->fetchAll();

	return new Response(json_encode($messages));

});

return $app;