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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\In')){
		trait In {
			// Define Where In Condition for Query
			// @param String $column | default Empty
			// @param Mixed $in | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function In(String $column = '', $in = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(!Framework\Validator::IsNullOrEmpty($column)){
					$in = str_replace(array('`', '\'', '"'), array('', '', ''), $in);
					$in = is_array($in) ? '\'' . join('\', \'', $in) . '\'' : $in;
					self::$wheres[] = array('where_in' => $column, 'in' => $in, 'type' => 'and');
				}
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Clone of In Method
			// @param String $column | default Empty
			// @param Mixed $in | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function AndIn(String $column = '', $in = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				return(self::In($column, $in, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\In::class);
}
?>