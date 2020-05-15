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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Maximum')){
		trait Maximum {
			// Get Highest Content of Selected Column in Query Result
			// @param String $max | default Empty
			// @param Callable $closure | default null
			// return Float
			public static function Maximum(String $max = '', Callable $closure = null) : Float {
				self::Select('MAX(' . $max . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				is_callable($closure) ? $closure($result) : '';
				return($result);
			}
			// Clone of Maximum Method
			// @param String $max | default Empty
			// @param Callable $closure | default null
			// return Float
			public static function Max(String $max = '', Callable $closure = null) : Float {
				return(self::Maximum($max, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Maximum::class);
}
?>