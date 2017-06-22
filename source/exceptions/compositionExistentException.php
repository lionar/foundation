<?php

namespace foundation\exceptions;

use RuntimeException as runtimeException;

class compositionExistentException extends runtimeException
{
	public function __construct ( string $key )
	{
		$this->message = "A composition under the key: $key already exists.";
	}
}