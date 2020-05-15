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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Concat')){
		trait Concat {
			// Concat Function for Join to Strings Together
			// @param String $first_join | default Empty
			// @param String $second_join | default Empty
			// return String
			public static function Concat(String $first_join = '', String $second_join = '') : String {
				$first_join = Framework\Safe::Trim($first_join);
				$first_join = preg_match('/\`(.*?)\`/imu', $first_join) ? $first_join : '\'' . $first_join . '\'';
				$second_join = Framework\Safe::Trim($second_join);
				$second_join = preg_match('/\`(.*?)\`/imu', $second_join) ? $second_join : '\'' . $second_join . '\'';
				$concat = 'CONCAT(' . $first_join . ', ' . $second_join . ')';
				return($concat);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Concat::class);
}
?>