<?php

class view
{
 	private static $engine = null;

   	public static function composedBy ( agreed\view $engine )
   	{
   		static::$engine = $engine;
   	}

   	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$engine )
        	throw new RuntimeException ( 'No view engine has been set.' );
        
        return static::$engine->$method ( ...$args );
    }
}
