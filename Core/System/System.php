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

namespace TkStar\LaunchPad\Web {
	use \TkStar\LaunchPad\Web\Components\System as Component;
	if(!class_exists('System')){
		// System Class for Processes of LaunchPad in Software Side Such as Cli
		class System extends LaunchPad {
			// @trait \TkStar\LaunchPad\Web\Components\System\Kernel
			use Component\Kernel;
			// System Initialize for Pure LaunchPad
			// @no_param
			// return Boolean
			public static function Initialize() : Bool {
				self::PHP_OS();
				self::Check_Cli();
				self::Check_Linux();
				self::Check_Windows();
				return true;
			}
		}
	}
	return(\TkStar\LaunchPad\Web\System::class);
}
?>