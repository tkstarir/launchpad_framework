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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\Properties {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Orders')){
		// Set Order By Column and ASC or DESC Based on PDO
		trait Orders {
			// Set Order By for Query
			// @param String $order_by | default Empty
			// @param String $asc_or_desc | default ASC
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function OrderBy(String $order_by = '', String $asc_or_desc = 'ASC', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				$database_object = self::Static();
				$order_by = Framework\Safe::String($order_by);
				$order_by = str_replace(array('`'), array(''), $order_by);
				$order_by = self::Appellation($order_by, 'column');
				$asc_or_desc = Framework\Safe::String($asc_or_desc);
				$asc_or_desc = Framework\Safe::Lower_Case($asc_or_desc);
				$asc_or_desc = !in_array($asc_or_desc, array('asc', 'desc')) ? '' : $asc_or_desc;
				$asc_or_desc = Framework\Safe::Upper_Case($asc_or_desc);
				self::$order_by[] = $order_by;
				self::$asc_or_desc[] = $asc_or_desc;
				is_callable($closure) ? $closure($database_object) : '';
				return($database_object);
			}
			// Set Order By as ASC for Query
			// @param String $order_by | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function OrderByAsc(String $order_by = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				return(self::OrderBy($order_by, 'ASC', $closure));
			}
			// Set Order By as DESC for Query
			// @param String $order_by | default Empty
			// @param Callable $closure | default null
			// return \TkStar\LaunchPad\Web\Database
			public static function OrderByDesc(String $order_by = '', Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				return(self::OrderBy($order_by, 'DESC', $closure));
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Orders::class);
}
?>