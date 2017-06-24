<?php

use Closure as closure;

class effects
{
	private $collection = [ ];

	public function add ( string $effect, closure $callback )
	{
		$this->collection [ $effect ] = $callback;
	}

	public function get ( string $effect )
	{
		if ( $this->has ( $effect ) )
			return $this->collection [ $effect ];
		throw new inexistentEffect ( $effect );
	}
}

effect::add ( 'failed to add an exercise', function ( exercise $exercise )
{

} );

app::triggers ( 'failed to add an exercise', 
	when ( 'i want to add an exercise' ), resultsIn ( false ) );


class app
{
	public function make ( string $abstract, array $payload = [ ] )
	{
		$result = $this->container->make ( $abstract, $payload );
		$this->event->fire ( $abstract, with ( 'result' ) );
	}

	public function triggers ( string $trigger, string $event, $resultingIn )
	{
		$this->event->listen ( $event, function ( $result ) use ( $resultingIn, $trigger )
		{
			if ( $result !== $resultingIn )
				return;
			$callback = $this->triggers->get ( $trigger );
			return $this->make ( $callback );
		} );
	}
}

