<?php

namespace foundation;

use events\dispatcher;
use ioc\container;
use input\collection as input;
use function compact as with;

class app extends container
{
	use \accessibility\readable;
	
	private $effects = null;
	private $event = null;
	private $input = null;

	public function __construct ( dispatcher $events = null, input $input = null, effects $effects = null )
	{
		parent::__construct ( );
		$this->event = ( $events ) ?: new dispatcher;
		$this->setupInput ( $input );
		$this->effects = ( $effects ) ?: new effects;
	}

	public function make ( string $abstract, array $payload = [ ] )
	{
		$payload = array_merge ( $this->input->all ( ), $payload );
		$result = parent::make ( $abstract, $payload );
		$this->event->fire ( $abstract, with ( 'result', 'payload' ) );
		return $result;
	}

	public function triggers ( string $trigger, string $abstract, $resultingIn )
	{
		$this->event->listen ( $abstract, function ( $result, $payload ) use ( $resultingIn, $trigger )
		{
			if ( $result !== $resultingIn )
				return;
			$callback = $this->effects->get ( $trigger );
			return $this->call ( $callback, $payload );
		} );
	}

	private function setupInput ( input $input = null )
	{
		$input = ( $input ) ?: new input;
		$this->share ( 'input', function ( ) use ( $input ) { return $input; } );
		$this->input = $input;
	}
}