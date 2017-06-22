<?php

class request
{
	private static $instance = null;

    public static function instance ( agreed\http\request $instance )
    {
    	static::$instance = $instance;
    }

	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No request instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}
