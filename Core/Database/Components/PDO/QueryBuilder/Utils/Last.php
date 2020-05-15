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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Last')){
		trait Last {
			// Get Last Index of Your Query Result
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function Last(Callable $closure = null){
				self::Select('*');
				$fetch = self::Result(true);
				$fetch = Framework\Safe::ToArray($fetch);
				if(count($fetch) <= 0){
					$output = false;
				}else{
					$index = count($fetch) - 1;
					$fetch = $fetch[$index];
					$output = $fetch;
				}
				if($fetch !== false){
					is_callable($closure) ? $closure($output) : '';
				}
				return($output);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Last::class);
}
?>