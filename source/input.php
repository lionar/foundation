<?php

namespace foundation;

use Closure as closure;
use foundation\exceptions\bindingExistentException;
use foundation\exceptions\compositionExistentException;
use InvalidArgumentException as invalidArgumentException;

class input
{	
	private $collection = [ ];
	private $bindings = [ ];
	private $compositions = [ ];

	public function __set ( string $key, $value )
	{
		$this->collection [ $key ] = $value;
	}

	public function __get ( string $key )
	{
		if ( ! isset ( $this->collection [ $key ] ) )
			throw new invalidArgumentException ( "$key does not exist." );

		return $this->collection [ $key ];
	}

	public function all ( ) : array
	{
		return $this->collection;
	}

	public function bind ( $key, closure $binding )
	{
		if ( isset ( $this->bindings [ $key ] ) )
			throw new bindingExistentException ( $key );
		$this->bindings [ $key ] = $binding;
	}

	public function composition ( $key, closure $binding )
	{
		if ( isset ( $this->bindings [ $key ] ) )
			throw new compositionExistentException ( $key );
		$this->compositions [ $key ] = $binding;
	}
}