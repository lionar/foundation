<?php

use foundation\statuses;

class status
{
	private static $instance = null;

	public static function instance ( statuses $statuses )
	{
		self::$instance = $statuses;
	}

	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No statuses instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}