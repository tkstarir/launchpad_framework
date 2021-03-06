<?php
/*
| TkStar LaunchPad Framework - Web Version
|
| An Open Source Framework Development Under PHP Languge. This Programm is Under MIT License (MIT)
|
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
|
| #TkStar Library
| #License: "http://opensource.org/licenses/MIT"
| #Link: "https://www.tkstar.ir"
| #Stable: 1.5.0
|
*/

// LaunchPad NameSpace
// Remember: Don't Touch it and Always use it in Custom Files

namespace TkStar\LaunchPad\Web\Components\System\Scheduling {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\System\Scheduling\PHP_OS')){
		trait PHP_OS {
			// Get PHP Operating System
			// @no_param
			// return String
			public static function PHP_OS() : String {
				$php_os = PHP_OS;
				$php_os = Framework\Safe::Upper_Case($php_os);
				$php_os = mb_substr($php_os, 0, 3, self::$charset);
				self::$os = $php_os;
				return($php_os);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\System\Scheduling\PHP_OS::class);
}
?>