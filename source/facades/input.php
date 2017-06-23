<?php

class input
{
   	protected static $instance = null;

   	public static function instance ( input\collection $instance )
   	{
   		static::$instance = $instance;
   	}

   	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No input instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}
