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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Slices')){
		// Slices Methods Based on PDO
		trait Slices {
			// Slice Fetched Result To Your Number of Pieces
			// @param Int $offset | default 0
			// @param Mixed $length | default 0
			// @param Callable $closure | default null
			// return Array
			public static function Slice(Int $offset = 0, $length = 0, Callable $closure = null) : Array {
				$data = self::Fetch('*');
				if($offset >= 0 AND is_numeric($length) AND $length >= 1){
					$offset = $offset <= 0 ? 0 : $offset;
					$data = array_slice($data, $offset, $length);
				}else{
					$data = array_slice($data, 0, $offset);
				}
				is_callable($length) ? $length($data) : '';
				is_callable($closure) ? $closure($data) : '';
				return($data);
			}
			// Slice Fetched Result To Your Number of Pieces By AI Column
			// @param Int $offset | default 0
			// @param Mixed $length | default 0
			// @param Mixed $ai_column | default Empty
			// @param Callable $closure | default null
			// return Array
			public static function SliceById(Int $offset = 0, $length = 0, $ai_column = '', Callable $closure = null) : Array {
				$data = self::Fetch('*');
				if($offset >= 0 AND is_numeric($length) AND $length >= 1){
					$column = Framework\Validator::IsNullOrEmpty($ai_column) ? self::Appellation(self::$ai_column, 'column') : $ai_column;
					foreach($data as $key => $value){
						settype($value[$column], 'Int');
						if($value[$column] <= $offset){
							unset($data[$key]);
						}
					}
					$data = array_slice($data, 0, $length);
				}else{
					$data = array_slice($data, 0, $offset);
				}
				is_callable($length) ? $length($data) : '';
				is_callable($ai_column) ? $ai_column($data) : '';
				is_callable($closure) ? $closure($data) : '';
				return($data);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Slices::class);
}
?>