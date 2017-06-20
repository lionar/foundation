<?php

namespace agreed;

use Closure as closure;

interface router
{
	public function get ( string $uri, closure $action );

	public function post ( string $uri, closure $action );
}