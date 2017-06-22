<?php

namespace foundation\exceptions;

use RuntimeException as runtimeException;

class bindingExistentException extends runtimeException
{
	public function __construct ( string $key )
	{
		$this->message = "An input binding under the key: $key already exists.";
	}
}