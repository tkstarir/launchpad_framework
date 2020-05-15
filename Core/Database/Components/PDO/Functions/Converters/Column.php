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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Converters')){
		trait Column {
			// Convert a String to Column Base
			// @param String $column | default Empty
			// return String
			public static function Column(String $column = '') : String {
				$column = Framework\Safe::Trim($column);
				$column = strpos($column, '`') !== false ? str_replace(array('`'), array(''), $column) : $column;
				$column = '`' . $column . '`';
				return($column);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Column::class);
}
?>