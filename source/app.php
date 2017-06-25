<?php

namespace foundation;

use ioc\container;

class app extends container
{
	public function make ( string $abstract, array $payload = [ ] )
	{
		$payload = array_merge ( parent::make ( 'input' )->all ( ), $payload );
		return parent::make ( $abstract, $payload );
	}
}