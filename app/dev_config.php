<?php

return array(
	'debug' => true,
	'monolog' => array(
		'level' => 'DEBUG',
	),
	'dbs' => array(
		'default' => [
			'driver' => 'pdo_mysql',
			'dbname' => 'goodboo',
			'host'   => 'localhost',
			'user'   =>  'root',
			'password' => 'root',
			'port' => 3306,
			'charset' => 'utf8'
		],
	),
);