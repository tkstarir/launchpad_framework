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

namespace TkStar\LaunchPad\Web {
	use \PDO, \PDOException;
	use \TkStar\LaunchPad\Web\Components\Database\PDO as Component;
	if(!class_exists('Database')){
		class Database extends LaunchPad {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Commands\Result
			use Component\Commands\Result;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Commands\Result
			use Component\Commands\RowCount;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Connection
			use Component\Connection;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\First_Initialize_Command
			use Component\First_Initialize_Command;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Execute
			use Component\Execute;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Initialize
			use Component\Initialize;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions
			use Component\Functions;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\AI_Column
			use Component\Properties\AI_Column;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\GroupBy
			use Component\Properties\GroupBy;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Limit_Offset
			use Component\Properties\Limit_Offset;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Orders
			use Component\Properties\Orders;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Table
			use Component\Properties\Table;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Confine
			use Component\QueryBuilder\Confine;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Delete
			use Component\QueryBuilder\Delete;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Each
			use Component\QueryBuilder\Each;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Exists
			use Component\QueryBuilder\Exists;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Fetch
			use Component\QueryBuilder\Fetches;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Fragments
			use Component\QueryBuilder\Fragments;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Ins
			use Component\QueryBuilder\Ins;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Joins
			use Component\QueryBuilder\Joins;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Select
			use Component\QueryBuilder\Select;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Slices
			use Component\QueryBuilder\Slices;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Update
			use Component\QueryBuilder\Update;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Utils
			use Component\QueryBuilder\Utils;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Unions
			use Component\QueryBuilder\Unions;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Wheres
			use Component\QueryBuilder\Wheres;
			// @property \PDO $connection | default null
			protected static $connection = NULL;
			// @property Boolean $debug_errors | default null
			protected static $debug_errors = false;
			// @property Int $fetch_type | default PDO::FETCH_NAMED
			protected static $fetch_type = PDO::FETCH_NAMED;
			// @property Int $stringify_fetches | default PDO::ATTR_STRINGIFY_FETCHES
			protected static $stringify_fetches = PDO::ATTR_STRINGIFY_FETCHES;
			// @property Boolean $emulate_prepares | default true
			protected static $emulate_prepares = true;
			// @property Int $error_mode | default PDO::ERRMODE_EXCEPTION
			protected static $error_mode = PDO::ERRMODE_EXCEPTION;
			// @property Int $null_natural | default PDO::NULL_NATURAL
			protected static $null_natural = PDO::NULL_NATURAL;
			// @property \PDO $current_process | default Null
			protected static $current_process = null;
			// @property Boolean $is_model | default false
			protected static $is_model = false;
			// @property String $table | default Empty
			protected static $model_name = '';
			// @property String $table | default Empty
			protected static $table = '';
			// @param Int $initializes_count | default 0
			protected static $initializes_count = 0;
			// Valid Operators for Where Ifs Closures
			// @param Array $valid_operators | default array('=', '!=', '<', '>', '<=', '>=', '<>', '+=', '-=', '*=', '/=', '&=', '%=', '^-=', '|*=')
			protected static $valid_operators = array('=', '!=', '<', '>', '<=', '>=', '<>', '+=', '-=', '*=', '/=', '&=', '%=', '^-=', '|*=');
			// @property Int $limit | default 0
			protected static $limit = 0;
			// @property Int $offset | default Null
			protected static $offset = null;
			// @property String $order_by | default array()
			protected static $order_by = array();
			// @property String $asc_or_desc | default array()
			protected static $asc_or_desc = array();
			// @property String $group_by | default Empty
			protected static $group_by = '';
			// @property String $ai_column | default id
			protected static $ai_column = 'id';
			// @property String $unions | default Empty
			protected static $unions = '';
			// @property Array $targets | default array()
			protected static $targets = array();
			// @property Array $wheres | default array()
			protected static $wheres = array();
			// @property Array $havings | default array()
			protected static $havings = array();
			// @property String $table_prefixes | default Empty
			protected static $table_prefixes = '';
			// @property String $table_suffixes | default Empty
			protected static $table_suffixes = '';
			// @property String $column_prefixes | default Empty
			protected static $column_prefixes = '';
			// @property String $column_suffixes | default Empty
			protected static $column_suffixes = '';
			// @property String $column_suffixes | default Empty
			protected static $joins = array();
			// @property Boolean $aggregate | default false
			protected static $aggregate = false;
			// Return Clone of Self Class as Static for OOP Objects
			// @no_param
			// return \TkStar\LaunchPad\Web\Database
			private static function Static() : \TkStar\LaunchPad\Web\Database {
				$static = new Self();
				return($static);
			}
			// Reset Database Stats to Default
			// @param Callable $closure | default null
			// return Boolean
			public static function Reset(Callable $closure = null) : Bool {
				$database_object = self::Static();
				self::$joins = array();
				self::$wheres = array();
				self::$targets = array();
				self::$unions = '';
				self::$ai_column = 'id';
				self::$asc_or_desc = '';
				self::$order_by = '';
				self::$offset = null;
				self::$limit = '0';
				self::$current_process = null;
				self::$table = '';
				self::$initializes_count = 0;
				is_callable($closure) ? $closure($database_object) : '';
				return true;
			}
			// Get Current Table Name or Model Target
			// @param Callable $closure | default null
			// return String
			public static function Target(Callable $closure = null) : String {
				$database_object = self::Static();
				$table = self::$table;
				is_callable($closure) ? $closure(self::$table) : '';
				return($table);
			}
			// Activate Database Connection or Models
			// @no_param
			// return Boolean
			public static function Active() : Bool {
				$server = Config::Database('Server');
				$username = Config::Database('Username');
				$password = Config::Database('Password');
				$database = Config::Database('Database');
				$port = Config::Database('Port');
				$debug_errors = Config::Database('Debug_Errors');
				self::Connect($username, $password, $database, $server, $port, $debug_errors);
				return true;
			}
			// Show Debug Errors or Notices in Console or Client
			// @param Mixed $error | default empty
			// return Boolean
			public static function Debuging($error = '') : Bool {
				$new_line = Config::Core('Special_Characters');
				$new_line = $new_line['L'];
				$message = is_string($error) ? $error : $error->getMessage();
				echo('PDO Connection Error<br>PDOException Error : ' . $message . $new_line);exit();
				return true;
			}
			// Check Database Connection is Activated or Not
			// @no_param
			// return Boolean
			public static function Check_Activation() : Bool {
				return empty(self::$connection) ? self::Debuging('Database is not Activated !') : false;
			}
			// Add Prefix And Suffix of Columns or Tables into a Name
			// @param String $name | default Empty
			// @param String $type | default table (table|column)
			// return String
			public static function Appellation(String $name = '', String $type = 'table') : String {
				self::Check_Activation();
				$name = self::Remove_Appellation($name, $type);
				$prefix = $type == 'column' ? self::$column_prefixes : self::$table_prefixes;
				$suffix = $type == 'column' ? self::$column_suffixes : self::$table_suffixes;
				$name = $prefix . $name . $suffix;
				return($name);
			}
			// Add Prefix And Suffix of Columns or Tables from a Name if Exists
			// @param String $name | default Empty
			// @param String $type | default table (table|column)
			// return String
			public static function Remove_Appellation(String $name = '', String $type = 'table') : String {
				self::Check_Activation();
				$name = Safe::Trim($name);
				$prefix = $type == 'column' ? self::$column_prefixes : self::$table_prefixes;
				$suffix = $type == 'column' ? self::$column_suffixes : self::$table_suffixes;
				$name = preg_replace('/' . $prefix . '/imu', '', $name);
				$name = preg_replace('/' . $suffix . '/imu', '', $name);
				return($name);
			}
			// Clean Query for a Neat and Valid Query Statement
			// @param String $query
			// return String
			public static function Clean_Query(String $query) : String {
				$query = Safe::Trim($query);
				$query = str_replace(array('( ', ' )'), array('(', ')'), $query);
				$query = str_replace(array(' OR)', ' AND)'), array(')', ')'), $query);
				$query = str_replace(array(' AND AND ', ' OR OR '), array(' AND ', ' OR '), $query);
				$query = str_replace(array(' AND OR '), array(' OR '), $query);
				$query = str_replace(array(' OR AND '), array(' AND '), $query);
				$query = preg_replace('/BETWEEN (.*?) AND (.*?)/imu', 'BETWEEN$1-$2', $query);
				$query = count(self::$wheres) <= 1 ? str_replace(array('OR ', 'AND '), array('', ''), $query) : $query;
				$query = preg_replace('/BETWEEN(.*?)-(.*?)/imu', 'BETWEEN $1 AND $2', $query);
				$query = Safe::Trim($query);
				return($query);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Database::class);
}
?>