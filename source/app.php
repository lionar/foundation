<?php

namespace foundation;

use ioc\container;
use input\collection as input;

class app extends container
{
	use \accessibility\readable;
	
	private $input = null;

	public function __construct ( input $input = null )
	{
		parent::__construct ( );
		$this->setupInput ( $input );
	}

	public function make ( string $abstract, array $payload = [ ] )
	{
		$payload = array_merge ( $this->input->all ( ), $payload );
		return parent::make ( $abstract, $payload );
	}

	private function setupInput ( input $input = null )
	{
		$input = ( $input ) ?: new input;
		$this->share ( 'input', function ( ) use ( $input ) { return $input; } );
		$this->input = $input;
	}
}