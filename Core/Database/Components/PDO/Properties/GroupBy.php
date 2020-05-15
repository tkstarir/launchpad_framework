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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\GroupBy')){
		// Set Group By for Query
		trait GroupBy {
			// Set Group By for Query
			// @param String $group_by | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function GroupBy(String $group_by = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$group_by = Framework\Safe::String($group_by);
				$group_by = str_replace(array('`'), array(''), $group_by);
				$group_by = self::Appellation($group_by, 'column');
				self::$group_by = $group_by;
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\GroupBy::class);
}
?>