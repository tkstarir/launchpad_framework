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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\System\Scheduling\IsLinux')){
		trait IsLinux {
			// Get Current Status of $linux Property
			// @no_param
			// return Boolean
			public static function IsLinux() : Bool {
				return(self::$linux);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\System\Scheduling\IsLinux::class);
}
?>