<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",
 
    "host" =>"127.0.0.1",
 
    "database" => "renta_cars",
 
    "username" => "root",
 
    "password" => "root"
 
 ]);

 //Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();