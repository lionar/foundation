<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new foundation\app;
$app->share ( 'app', function ( ) use ( $app ) { return $app; } );

facade::setFacadeApplication ( $app );


$input = app::make ( 'input' );

$input->name = 'Aron';

var_dump ( app::make ( 'input' )->name );