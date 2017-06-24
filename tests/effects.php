<?php

use foundation\effects;

require __DIR__ . '/../vendor/autoload.php';

$effects = new effects;

$effects->add ( 'failed to add an exercise', function ( exercise $exercise )
{
	echo $exercise->name;
} );


var_dump ( $effects->get ( 'failed to add an exercise' ) );