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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates {
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Average')){
		trait Average {
			// Get Average Value of Selected Column in Query Result
			// @param String $max | default Empty
			// @param Callable $closure | default null
			// return Float
			public static function Average(String $average = '', Callable $closure = null) : Float {
				self::Select('AVG(' . $average . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				is_callable($closure) ? $closure($result) : '';
				return($result);
			}
			// Clone of Average Method
			// @param String $average | default Empty
			// @param Callable $closure | default null
			// return String
			public static function Avg(String $average = '', Callable $closure = null) : Float {
				return(self::Average($average, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Average::class);
}
?>