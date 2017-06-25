<?php

namespace foundation;

use ioc\container;

class app extends container
{
	private $statuses = null;

	public function __construct ( statuses $statuses )
	{
		parent::__construct ( );
		$this->statuses = $statuses;
	}

	public function make ( string $abstract, array $payload = [ ] )
	{
		$payload = array_merge ( parent::make ( 'input' )->all ( ), $payload );
		return parent::make ( $abstract, $payload );
	}

	public function fullfill ( string $abstract )
	{
		$response = $this->make ( $abstract );
		return $this->call ( $this->statuses->get ( $response [ 0 ] ), $response [ 1 ] );
	}
}