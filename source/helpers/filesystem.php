<?php

namespace filesystem;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use RecursiveRegexIterator;

function require_recursive ( $directory )
{
	$directory = new RecursiveDirectoryIterator ( $directory );
	$iterator = new RecursiveIteratorIterator ( $directory );
	$objects = new RegexIterator ( $iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH );


	foreach ( $objects as $directory )
	  	foreach ( $directory as $file )
	  		require $file;
}