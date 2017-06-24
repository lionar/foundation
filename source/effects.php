<?php

namespace foundation;

use Closure as closure;
use foundation\exceptions\inexistentEffectException;

class effects
{
	private $collection = [ ];

	public function add ( string $name, closure $callback )
	{
		if ( ! $this->has ( $name ) )
			$this->collection [ $name ] = $callback;
	}

	public function get ( string $name ) : closure
	{
		if ( $this->has ( $name ) )
			return $this->collection [ $name ];
		throw new inexistentEffectException ( $name );
	}

	public function has ( string $name ) : bool
	{
		return array_key_exists ( $name, $this->collection );
	}
}