<?php

namespace foundation;

use ioc\container;

class app extends container
{
	private $statuses = null;

	public function __construct ( statuses $statuses )
	{
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
		return $this->make ( $this->statuses->get ( $response [ 0 ] ), $response [ 1 ] );
	}
}