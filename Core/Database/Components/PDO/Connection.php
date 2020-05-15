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
	use \PDO, \PDOException;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Connection')){
		// Database Connection Method for Activation Connection Based on PDO
		trait Connection {
			// Connect to Database with Your Details under PDO
			// @param String $username | default Empty
			// @param String $password | default Empty
			// @param String $database | default Empty
			// @param String $hostname | default Empty
			// @param Int $port | default 3306
			// @param Boolean $debug_errors | default true
			// return Boolean
			private static function Connect(String $username = '', String $password = '', String $database = '', String $hostname = 'localhost', Int $port = 3306, Bool $debug_errors = true) : Bool {
				try{
					if(empty(self::$connection)){
						self::$connection = new PDO('mysql: host=' . $hostname . '; port=' . $port . '; dbname=' . $database, $username, $password);
						$first_command = self::First_Initialize_Command();
						self::$connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, self::$stringify_fetches);
						self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, self::$emulate_prepares);
						self::$connection->setAttribute(PDO::ATTR_ERRMODE, self::$error_mode);
						self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, self::$null_natural);
						self::$connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, $first_command);
						self::$connection->exec($first_command);
						self::$debug_errors = $debug_errors;
						$defaults = array('def', 'default', 'empty', 'none', 'undefined', 'null', null);
						(in_array(self::$table_prefixes, $defaults)) ? self::$table_prefixes = Framework\Config::Database('Tables_Prefixes') : '';
						(in_array(self::$table_suffixes, $defaults)) ? self::$table_suffixes = Framework\Config::Database('Tables_Suffixes') : '';
						(in_array(self::$column_prefixes, $defaults)) ? self::$column_prefixes = Framework\Config::Database('Columns_Prefixes') : '';
						(in_array(self::$column_suffixes, $defaults)) ? self::$column_suffixes = Framework\Config::Database('Columns_Suffixes') : '';
						Framework\Logs::Info('Database Initialized !');
						return true;
					}else{
						Framework\Logs::Warning('Database Already Initialized !');
						return false;
					}
				}catch(PDOException $error){
					Framework\Logs::Warning('Database Connection Has a Problem. Please Check it');
					self::$debug_errors ? self::Debuging($error) : '';
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Connection::class);
}
?>