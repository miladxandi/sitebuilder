<?php

namespace Core\Security;

class Check
{
    public static function SecureProtocol(bool $Https = false)
    {
        if ($Https == true)
        {
            if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off")
            {
                $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                header('HTTP/1.1 301 Moved Permanently');
                header('Location: ' . $redirect);
                return true;
            }

            else
            {
                return true;
            }
        }

        elseif ($Https == false)
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}