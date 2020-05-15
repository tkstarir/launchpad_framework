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

namespace TkStar\LaunchPad\Web\Components\Database\PDO {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\First_Initialize_Command')){
		// First Initialize Command for PDO Connection
		trait First_Initialize_Command {
			// First Initialize Command for PDO Connection
			// @no_param
			// return String
			private static function First_Initialize_Command() : String {
				self::Check_Activation();
				$charset = Framework\Config::Database('Charset');
				$collation = Framework\Config::Database('Collation');
				$command = 'SET NAMES `{Charset_Name}` COLLATE `{Database_Collation}`';
				$command = str_replace(array('{Charset_Name}'), array($charset), $command);
				$command = str_replace(array('{Database_Collation}'), array($collation), $command);
				settype($command, 'String');
				return($command);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\First_Initialize_Command::class);
}
?>