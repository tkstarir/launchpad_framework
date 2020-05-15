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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\Where')){
		trait Where {
			// Define Wheres and Ifs for Queries in Models or QueryBuilder
			// @param Mixed $column | default Empty
			// @param Mixed $operator | default Empty
			// @param Mixed $value | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function Where($column = '', $operator = '', $value = null, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(is_array($column)){
					foreach($column as $key => $value){
						$column = $value[0];
						$operator = isset($value[2]) ? $value[1] : '=';
						$operator = !in_array($operator, self::$valid_operators) ? '=' : $operator;
						$value = isset($value[2]) ? $value[2] : $value[1];
						self::Where($column, $operator, $value);
					}
				}elseif(is_null($value) OR is_callable($value)){
					self::$wheres[] = array('where' => $column, 'if' => $operator, 'operator' => '=', 'type' => 'and');
				}else{
					$operator = !in_array($operator, self::$valid_operators) ? '=' : $operator;
					self::$wheres[] = array('where' => $column, 'if' => $value, 'operator' => $operator, 'type' => 'and');
				}
				is_callable($operator) ? $operator($database_object) : '';
				is_callable($value) ? $value($database_object) : '';
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Clone of Where Method
			// @param Mixed $column | default Empty
			// @param Mixed $operator | default Empty
			// @param Mixed $value | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function AndWhere($column = '', $operator = '', $value = null, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				return(self::Where($column, $operator, $value, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\Where::class);
}
?>