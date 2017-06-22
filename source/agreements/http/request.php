<?php

namespace agreed\http;

interface request
{
	public function get ( string $key, $default = null );
}