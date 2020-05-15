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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\Properties {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\AI_Column')){
		// Change AI Column Based on PDO
		trait AI_Column {
			// Change Auto Increment Column Name
			// @param String $column
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function AI_Column(String $column, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$column = Framework\Safe::Trim($column);
				self::$ai_column = $column;
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\AI_Column::class);
}
?>