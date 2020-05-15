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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Table')){
		// Select Table for Connection Based on PDO
		trait Table {
			// Select Table for Queries
			// in Models You Haven't Access to This Method
			// @param String $table | default Empty
			// @param String $closure | default mull
			// return \TkStar\LaunchPad\Web\Database
			public static function Table($table = null, Callable $closure = null) : \TkStar\LaunchPad\Web\Database {
				self::Check_Activation();
				$database_object = self::Static();
				if(self::$is_model == false){
					$table = Framework\Safe::Trim($table);
					$table = self::Appellation($table, 'table');
					self::$table = $table;
					is_callable($closure) ? $closure($database_object) : '';
					return($database_object);
				}else{
					Logs::Warning('You Can\'t Set a Table Name for Following Model: ' . self::$model_name);
					return($database_object);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Properties\Table::class);
}
?>