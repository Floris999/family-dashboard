<?php
//Empty template to configure the firebase connection. 
//Make sure to full in:
//jsonFilePath
//withDatabaseUri


require(__DIR__. "/vendor/autoload.php");
use Kreait\Firebase\Factory;

$jsonFilePath = __DIR__ . '';

$factory = (new Factory)
    ->withServiceAccount($jsonFilePath)
    ->withDatabaseUri('');

$database = $factory->createDatabase();

