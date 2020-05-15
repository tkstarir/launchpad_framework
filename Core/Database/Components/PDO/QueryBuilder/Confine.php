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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Confine')){
		// Confine Method Based on PDO
		trait Confine {
			// Get a Single Column as Result or Get a Single Column with a Custom Key
			// Custom Keys Only can be a Valid Column in Your Result
			// @param String $column | default Empty
			// @param Mixed $custom_key | default Empty
			// @param Callable $closure | default null
			// return Array
			public static function Confine(String $column = '', $custom_key = '', Callable $closure = null) : Array {
				$data = !Framework\Validator::IsNullOrEmpty($custom_key) ? self::fetch(array($column, $custom_key)) : self::Fetch($column);
				$output = array();
				if($column !== $custom_key){
					if(!Framework\Validator::IsNullOrEmpty($column)){
						foreach($data as $key => $value){
							if(!Framework\Validator::IsNullOrEmpty($custom_key)){
								$output[$value->$custom_key] = $value->$column;
							}else{
								$output[] = $value->$column;
							}
						}
					}
				}
				is_callable($custom_key) ? $custom_key($output) : '';
				is_callable($closure) ? $closure($output) : '';
				return($output);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Confine::class);
}
?>