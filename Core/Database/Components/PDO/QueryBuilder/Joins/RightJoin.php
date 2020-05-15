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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\RightJoin')){
		trait RightJoin {
			// Right Join Method for Join 2 Table with Them Columns
			// @param String $second_table | default Empty
			// @param String $left_column | default Empty
			// @param String $operator | default Empty
			// @param String $right_column | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function RightJoin(String $second_table = '', String $left_column = '', String $operator = '', String $right_column, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				self::$joins[] = array('type' => 'right_join', 'left_column' => $left_column, 'operator' => $operator, 'right_column' => $right_column, 'second_table' => $second_table);
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\RightJoin::class);
}
?>