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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNotNull')){
		trait OrWhereNotNull {
			// Define or Where not Null for a Column
			// @param String $column | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function OrWhereNotNull(String $column = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					self::$wheres[] = array('where' => $column, 'if' => null, 'operator' => '!=', 'type' => 'or');
				}
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNotNull::class);
}
?>