<?php

class path
{
    protected static $instance = null;

   	public static function instance ( path\collection $instance )
   	{
   		static::$instance = $instance;
   	}

   	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$instance )
        	throw new RuntimeException ( 'No path instance has been set.' );
        
        return static::$instance->$method ( ...$args );
    }
}
