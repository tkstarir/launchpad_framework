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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrBetweenWhere')){
		trait OrBetweenWhere {
			// Define Where Between Two Number
			// @param String $column | default Empty
			// @param Array $betweens | default array()
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function OrBetweenWhere(String $column = '', Array $betweens = array(), Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				if($betweens[0] < $betweens[1]){
					$database_object = self::Static();
					self::$wheres[] = array('where_between' => $column, 'betweens' => $betweens, 'type' => 'or');
				}
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrBetweenWhere::class);
}
?>