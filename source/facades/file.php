<?php

class file extends facade
{
    protected static function getFacadeAccessor ( )
    {
        return 'filesystem';
    }
}
