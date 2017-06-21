<?php

class route
{
	private static $router = null;

	public static function routedBy ( agreed\router $router )
	{
		static::$router = $router;
	}

	public static function __callStatic ( $method, $args )
    {
        if ( ! static::$router )
        	throw new RuntimeException ( 'No router has been set.' );
        
        return static::$router->$method ( ...$args );
    }
}