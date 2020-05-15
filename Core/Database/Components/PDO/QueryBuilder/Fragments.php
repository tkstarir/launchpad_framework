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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Fragments')){
		// Fragments Methods Based on PDO
		trait Fragments {
			// Fragmenting Your Results in Your Number for Incrase Speed and Prevent System Crashes Such as "out of memory"
			// @param Int $fragment_count | default 100
			// @param Callable $closure | default null
			// return Bool
			public static function Fragment(Int $fragment_count = 100, Callable $closure = null) : Bool {
				$offset = 0;
				$do_while_count = 0;
				do{
					self::Limit($fragment_count, $offset);
					self::Select('*');
					$result = self::Result(true);
					if(count($result) <= 0){
						break;
					}else{
						if(is_callable($closure)){
							if($closure($result) === false){
								break;
							}else{
								$do_while_count++;
								$offset = $fragment_count * $do_while_count;
							}
						}else{
							break;
						}
					}
				}while(count($result) <= $fragment_count);
				return true;
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Fragments::class);
}
?>