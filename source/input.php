<?php

namespace foundation;

use Closure as closure;

class input
{
	use \accessibility\readable;
	
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
}