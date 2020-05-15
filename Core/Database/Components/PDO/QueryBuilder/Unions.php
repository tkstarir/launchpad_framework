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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Unions')){
		// Each Method Based on PDO
		trait Unions {
			// Insert Current Query Statements into an Union Area and Clear it for New Query
			// @param String $select | default '*'
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function Union(String $select = '*', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$select = Framework\Validator::IsNullOrEmpty($select) ? '*' : $select;
				$select = self::Initialize('SELECT', $select);
				$select['query'] = 'UNION ' . $select['query'];
				self::$unions = $select['query'];
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Insert Current Query Statements into an Union All Area and Clear it for New Query
			// @param String $select | default '*'
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function UnionAll(String $select = '*', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$select = Framework\Validator::IsNullOrEmpty($select) ? '*' : $select;
				$select = self::Initialize('SELECT', $select);
				$select['query'] = 'UNION ALL ' . $select['query'];
				self::$unions = $select['query'];
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Unions::class);
}
?>