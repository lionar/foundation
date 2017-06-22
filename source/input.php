<?php

namespace foundation;

use Closure as closure;
use InvalidArgumentException as invalidArgumentException;

class input
{	
	private $collection = [ ];

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
}