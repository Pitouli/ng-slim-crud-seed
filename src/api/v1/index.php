<?php

require 'vendor/autoload.php';

//require './vendor/Slim/Slim.php';
require 'DB.class.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/user/:id', function($id) use ($app) {
	$db = new DB();
	
	$response = $db->r("customers_php")->where(array("id" => $id))->fetch($json = true);
	
	$app->status(200);
    $app->contentType('application/json'); 
	
	echo $response;
});

$app->run();
?>