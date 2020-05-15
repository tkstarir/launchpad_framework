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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\Commands {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Commands\RowCount')){
		// Query Select Result Method Based on PDO
		trait RowCount {
			// Get Result of Select Queries as Array
			// @no_param
			// return Float
			private static function RowCount() : Float {
				$target = self::Target();
				$result = self::$current_process->fetchAll(self::$fetch_type);
				$result = count($result);
				return($result);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Commands\RowCount::class);
}
?>