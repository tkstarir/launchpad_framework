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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Exists')){
		// Exists Method Based on PDO
		trait Exists {
			// Check Any Data Exists in Your Query Result or Not
			// @param Bool $exists | default true
			// @param Callable $closure | default null
			// return Int
			public static function Exists(Bool $exists = true, Callable $closure = null) : Int {
				self::Select('COUNT(*)');
				$count = self::Num();
				if($exists){
					if($count >= 1){
						$exists = true;
					}else{
						$exists = false;
					}
				}else{
					if($count >= 1){
						$exists = false;
					}else{
						$exists = true;
					}
				}
				is_callable($closure) ? $closure($exists) : '';
				return($exists);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Exists::class);
}
?>