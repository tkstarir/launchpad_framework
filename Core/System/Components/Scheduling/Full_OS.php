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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\System\Scheduling\Full_OS')){
		trait Full_OS {
			// Get Full Operating System Name That LaunchPad Run into it
			// @no_param
			// return String
			public static function Full_OS() : String {
				$os_details = php_uname();
				print_r(get_loaded_extensions());die;
				return($os_details);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\System\Scheduling\Full_OS::class);
}
?>