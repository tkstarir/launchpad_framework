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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Search')){
		trait Search {
			// Search for a Row With it AI Column
			// @param Mixed $ai_column_value | default 0
			// @param Mixed $ai_column | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function Search($ai_column_value = 0, $ai_column = null, Callable $closure = null){
				$column = Framework\Validator::IsNullOrEmpty($ai_column) ? self::Appellation(self::$ai_column, 'column') : self::Appellation($ai_column, 'column');
				self::Where($column, '=', $ai_column_value);
				self::Select('*');
				$fetch = self::Result(true);
				print_r($fetch);die;
				$fetch = Framework\Safe::ToArray($fetch);
				$fetch = count($fetch) <= 0 ? false : $fetch;
				$fetch = is_Array($fetch) ? $fetch[0] : $fetch;
				if($fetch !== false){
					is_callable($ai_column) ? $ai_column($fetch) : '';
					is_callable($closure) ? $closure($fetch) : '';
				}
				return($fetch);
			}
			// Clone of Search Method
			// @param Mixed $ai_column_value | default 0
			// @param Mixed $ai_column | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function Find(Int $ai_column_value = 0, $ai_column = null, Callable $closure = null){
				return(self::Search($ai_column_value, $ai_column, $closure));
			}
			// Find a Row With it AI Column
			// @param Int $ai_column_value | default 0
			// @param Mixed $ai_column | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function SearchById(Int $ai_column_value = 0, Callable $closure = null){
				return(self::Search($ai_column_value, self::$ai_column, $closure));
			}
			// Find a Row With it AI Column
			// @param Int $ai_column_value | default 0
			// @param Mixed $ai_column | default null
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Collection
			public static function FindById(Int $ai_column_value = 0, Callable $closure = null){
				return(self::Search($ai_column_value, self::$ai_column, $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Search::class);
}
?>