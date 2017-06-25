<?php

require __DIR__ . '/../../autoload.php';

$statuses = new foundation\statuses;
$app = new foundation\app ( $statuses );
$app->share ( 'app', function ( ) use ( $app ) { return $app; } );

app::instance ( $app );
status::instance ( $statuses );

( new input\inputServiceProvider ( $app ) )->register ( );


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

path::instance ( $path );

/*
|--------------------------------------------------------------------------
| Loading application services
|--------------------------------------------------------------------------
| Load in the application services.
| 
|
*/
filesystem\require_recursive ( $path->to ( 'bindings' ) );

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
| Load in the application business rules.
| 
|
*/
filesystem\require_recursive ( $path->to ( 'application' ) );