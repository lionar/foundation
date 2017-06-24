<?php

namespace foundation\exceptions;

class inexistentEffectException extends invalidArgumentException
{
	public function __construct ( string $effect )
	{
		$this->message = "An effect called: $effect does not exist.";
	}
}