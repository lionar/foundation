<?php

namespace text;

function capitalize ( string $text ) : string
{
	return ucfirst ( strtolower ( $text ) );
}

function capitalized ( string $text ) : string
{
	return capitalize ( $text );
}

function uppercase ( string $text ) : string
{
	return strtoupper ( $text );
}

function uppercased ( string $text ) : string
{
	return uppercase ( $text );
}

function lowercase ( string $text ) : string
{
	return strtolower ( $text );
}

function lowercased ( string $text ) : string
{
	return lowercase ( $text );
}