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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Each')){
		// Each Method Based on PDO
		trait Each {
			// Execute a Callable Closure After Fetch Data Each by Each of Indexes
			// @param Callable $closure | default null
			// @param Int $each_count | default 500
			// return Bool
			public static function Each(Callable $closure = null, Int $each_count = 500) : Bool {
				return(self::Fragment($each_count, function($results) use ($closure){
					foreach($results as $key => $value){
						if($closure($key, $value) === false){
							return false;
						}
					}
				}));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Each::class);
}
?>