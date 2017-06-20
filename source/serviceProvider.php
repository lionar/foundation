<?php

namespace foundation;

abstract class serviceProvider
{
	protected $app = null;

	public function __construct ( app $app )
	{
		$this->app = $app;
	}

	abstract public function register ( );
}