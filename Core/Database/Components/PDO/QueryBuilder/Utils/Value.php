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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Value')){
		trait Value {
			// Get Value of a Column by it Name
			// @param String $column | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function Value(String $column = '', Callable $closure = null){
				$fetch = self::First();
				if(is_object($fetch)){
					$fetch = $fetch->$column;
					$fetch = Framework\Validator::IsNullOrEmpty($fetch) ? false : $fetch;
				}else{
					$fetch = false;
				}
				$fetch !== false ? (is_callable($closure) ? $closure($fetch) : '') : '';
				return($fetch);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Search::class);
}
?>