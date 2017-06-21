<?php

require __DIR__ . '/../../autoload.php';

$app = new foundation\app;
$app->share ( 'app', function ( ) use ( $app ) { return $app; } );

facade::setFacadeApplication ( $app );

$app->share ( 'path', function ( )
{
	return new path\collection ( '../../..' );
} );