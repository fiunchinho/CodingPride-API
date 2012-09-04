<?php

/* Autoload from Composer */
require PATH . 'vendor/autoload.php';

/* Loading general config, Slim and Mongo */
$config = json_decode( file_get_contents( PATH . 'config.json' ), true );
$app    = new Slim( $config['slim'] );
$mongo 	= new Mongo( $config['mongo']['server'], $config['mongo']['options'] );
$db     = $mongo->selectDB( $config['mongo']['options']['db'] );

/* Loading routes / controllers */
require PATH . 'routes.php';

/* Rendering the results and running Slim */
require PATH . 'render.php';
