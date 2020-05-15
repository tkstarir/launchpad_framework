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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\System\Scheduling\Check_Cli')){
		trait Check_Cli {
			// Check Current Process Run into a PHP Cli Terminal or not
			// @no_param
			// return Boolean
			public static function Check_Cli() : Bool {
				$cli_detect = php_sapi_name();
				$cli_detect = Framework\Safe::Lower_Case($cli_detect);
				if($cli_detect == 'cli'){
					self::$cli = true;
					return true;
				}else{
					self::$cli = false;
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\System\Scheduling\Check_Cli::class);
}
?>