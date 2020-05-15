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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Limit_Offset')){
		// Set Limit and Offset for Connection Based on PDO
		trait Limit_Offset {
			// Set Limitation and Offset for Query Processes
			// @param Int $limit | default 0
			// @param Int $offset | default 0
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function Limit(Int $limit = 0, Int $offset = 0, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				if($limit >= 1){
					self::$limit = Framework\Safe::Number($limit);
					$offset >= 1 ? self::$offset = Framework\Safe::Number($offset) : '';
				}
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Set Offset for Query Processes
			// @param Int $offset | default 0
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function Offset(Int $offset = 0, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$offset >= 1 ? self::$offset = Framework\Safe::Number($offset) : '';
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Limit_Offset::class);
}
?>