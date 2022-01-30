<?php

namespace Core\Watcher;


final class Configurations extends Core
{
    public static $Version = PHP_VERSION;
    public static $OS = PHP_OS;
    public function MinVersion()
    {
        if (self::$Version>=7)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
