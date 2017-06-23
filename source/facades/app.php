<?php

class app
{
	private static $instance = null;

	public static function instance ( foundation\app $instance )
	{
		static::$instance = $instance;
	}

	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No app instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}