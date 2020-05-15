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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Fetches')){
		// Fetch Method Based on PDO
		trait Fetches {
			// Fetch Results By Your Query
			// @param Mixed $select | default '*'
			// @param Callable $closure | default null
			// return Array
			public static function Fetch($select = '*', Callable $closure = null) : Array {
				self::Select($select);
				$fetch = self::Result(true);
				$fetch = Framework\Safe::ToArray($fetch);
				is_callable($closure) ? $closure($fetch) : '';
				return($fetch);
			}
			// Clone of Fetch Method
			// @param Mixed $select | default '*'
			// @param Callable $closure | default null
			// return Array
			public static function Get($select = '*', Callable $closure = null) : Array {
				return(self::Fetch($select, $closure));
			}
			// Select All Columns and Replace Your Requested Columns to New Names
			// @param Mixed $select | default '*'
			// @param Mixed $as | default '*'
			// @param Callable $closure | default null
			// return Array
			public static function SelectAs($select = '*', $as = '*', Callable $closure = null) : Array {
				if(is_string($select) AND is_string($as)){
					$removes = array($select);
					$select = '*, `' . $select . '` AS `' . $as . '`';
				}elseif(is_array($select) AND is_array($as) AND count($select) == count($as)){
					$removes = array();
					$selects = array();
					$selects[] = '*';
					foreach($select as $key => $value){
						$removes[] = $value;
						$selects[] = '`' . $value . '` AS `' . $as[$key] . '`';
					}
					$select = join(', ', $selects);
				}else{
					$output = array();
					return($output);
				}
				self::Select($select);
				$fetch = self::Result(true);
				$fetch = Framework\Safe::ToArray($fetch);
				if(count($fetch) <= 0){
					$output = array();
					return($output);
				}else{
					foreach($fetch as $key => $value){
						foreach($removes as $remove){
							if(!Framework\Validator::IsNullOrEmpty($value->$remove)){
								unset($fetch[$key]->$remove);
							}
						}
					}
					is_callable($closure) ? $closure($fetch) : '';
					return($fetch);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Fetches::class);
}
?>