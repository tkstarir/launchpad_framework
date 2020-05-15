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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Minimum')){
		trait Minimum {
			// Get Lowest Content of Selected Column in Query Result
			// @param String $min | default Empty
			// @param Callable $closure | default null
			// return Float
			public static function Minimum(String $min = '', Callable $closure = null) : Float {
				self::Select('MIN(' . $min . ')');
				self::$aggregate = true;
				$result = self::Result(false);
				is_callable($closure) ? $closure($result) : '';
				return($result);
			}
			// Clone of Minimum Method
			// @param String $min | default Empty
			// @param Callable $closure | default null
			// return Float
			public static function Min(String $min = '', Callable $closure = null) : Float {
				return(self::Minimum($min, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Minimum::class);
}
?>