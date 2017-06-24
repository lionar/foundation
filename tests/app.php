<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new foundation\app;
app::instance ( $app );
effect::instance ( $app->effects );

app::bind ( 'i want to add an exercise', function ( )
{
	return false;
} );

effect::add ( 'failed to add an exercise', function ( $name )
{
	echo 'I failed to add an exercise named: ' . $name;
} );

app::triggers ( 'failed to add an exercise', 'i want to add an exercise', false );

var_dump($app->make ( 'i want to add an exercise', [ 'name' => 'Bench press' ] ));