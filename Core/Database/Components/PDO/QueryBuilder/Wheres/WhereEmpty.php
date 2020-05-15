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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereEmpty')){
		trait WhereEmpty {
			// Define Where Empty for a Column
			// @param String $column | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function WhereEmpty(String $column = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					self::$wheres[] = array('where' => $column, 'if' => '', 'operator' => '=', 'type' => 'and');
				}
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Clone of WhereEmpty Method
			// @param String $column | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function AndWhereEmpty(String $column = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::WhereEmpty($column, $closure);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereEmpty::class);
}
?>