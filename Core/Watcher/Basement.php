<?php

namespace Core\Watcher;


use Core\Requirement\oLoad;

final class Basement extends Core
{
	public static $Version = PHP_VERSION;
	public static $OS = PHP_OS;

	public static function MinVersion()
	{
		if (self::$Version >= 7) {
			return true;
		} else {
			echo "<div style='alignment: center'>You need to upgrade your PHP version! We need PHP 7.</div>";
			return false;
		}
	}
}