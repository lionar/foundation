<?php

namespace foundation;

use ioc\container;

class app extends container
{
	public function __construct ( input $input = null )
	{
		$input = ( $input ) ?: new input;
		$this->share ( 'input', function ( ) use ( $input ) { return $input; } );
	}
}