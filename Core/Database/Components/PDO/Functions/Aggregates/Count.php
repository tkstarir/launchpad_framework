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
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Count')){
		trait Count {
			// Get Number of Rows in a Query in Distinct or Normal Mode
			// @param String $column | default Empty
			// @param Mixed $distinct | default null
			// @param Callable $closure | default null
			// return Float
			public static function Count(String $column = '', $distinct = null, Callable $closure = null) : Float {
				$distinct_type = (is_callable($distinct) OR Framework\Validator::IsNullOrEmpty($distinct)) ? '' : ($distinct === true ? 'DISTINCT ' : '');
				self::Select('COUNT(' . $distinct_type . '`' . $column . '`)');
				self::$aggregate = true;
				$result = self::Result(false);
				is_callable($distinct) ? $distinct($result) : '';
				is_callable($closure) ? $closure($result) : '';
				return($result);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Count::class);
}
?>