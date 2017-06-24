<?php

use foundation\effects;

class effect
{
	private static $instance = null;

	public static function instance ( effects $effects )
	{
		static::$instance = $effects;
	}

	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No effect instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}