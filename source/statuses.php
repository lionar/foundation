<?php

namespace foundation;

use Closure as closure;

class statuses
{
	private $mapping = [ ];

	public function add ( int $status, closure $callback )
	{
		if ( ! $this->has ( $status ) )
			$this->mapping [ $status ] = $callback;
	}

	public function get ( int $status ) : closure
	{
		if ( $this->has ( $status ) )
			return $this->mapping [ $status ];
	}

	public function has ( int $status ) : bool
	{
		return array_key_exists ( $status, $this->mapping );
	}
}