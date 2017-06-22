<?php

require __DIR__ . '/../../autoload.php';

$app = new foundation\app;
$app->share ( 'app', function ( ) use ( $app ) { return $app; } );

facade::setFacadeApplication ( $app );


/*
|--------------------------------------------------------------------------
| Path
|--------------------------------------------------------------------------
| Set up path to the root of the application.
| 
|
*/

$path = new path\collection ( '../..' );

$app->share ( 'path', function ( ) use ( $path )
{
	return $path;
} );

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
| Load in the application business rules.
| 
|
*/
filesystem\require_recursive ( $path->to ( 'application' ) );