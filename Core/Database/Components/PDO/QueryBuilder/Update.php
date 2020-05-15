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
	use \PDO, \PDOException;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Update')){
		// Query Select Result Method Based on PDO
		trait Update {
			// Get Result of Select Queries as Array
			// @param Mixed $column | default array()
			// @param Mixed $value | default null
			// @param Callable $closure | default null
			// return Boolean
			public static function Update($column = array(), $value = null, Callable $closure = null) : Bool {
				try{
					$updates = is_array($column) ? $column : array($column => $value);
					$query_statements = self::Initialize('UPDATE', $updates);
					self::Execute($query_statements);
					self::Reset();
					$result = true;
				}catch(PDOException $error){
					Framework\Logs::Warning('Database Connection Has a Problem. Please Check it');
					self::$debug_errors ? self::Debuging($error) : '';
					$result = false;
				}finally{
					is_callable($value) ? $value($result) : '';
					is_callable($closure) ? $closure($result) : '';
					return($result);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Update::class);
}
?>