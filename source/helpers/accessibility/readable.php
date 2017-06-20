<?php

namespace accessibility;

trait readable
{
	public function __get ( $property )
	{
		if ( isset ( $this-> { $property } ) )
			return $this-> { $property };
	}
}