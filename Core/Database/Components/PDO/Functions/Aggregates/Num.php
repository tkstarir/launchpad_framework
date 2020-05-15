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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Num')){
		trait Num {
			// Get Total Num Rows (rowCount) of Query Result
			// @param Callable $closure | default null
			// return Float
			public static function Num(Callable $closure = null) : Float {
				self::Select('*');
				$result = self::RowCount();
				is_callable($closure) ? $closure($result) : '';
				return($result);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Num::class);
}
?>