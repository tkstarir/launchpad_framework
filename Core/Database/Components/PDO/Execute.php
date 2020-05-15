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
	use \PDO;
	use \PDOException;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Execute')){
		// Prepare Method for Connection Based on PDO
		trait Execute {
			// Prepare Query and Execute it
			// @param Array $query_statements | default array()
			// return Boolean
			private static function Execute(Array $query_statements = array()){
				if(isset($query_statements['query'])){
					try{
						self::$current_process = null;
						$query = self::$connection->prepare($query_statements['query']);
						foreach(self::$targets as $target_key => $target_value){
							$param_type = gettype($target_value);
							switch($param_type){
								case('string'): $parameter_type = PDO::PARAM_STR; break;
								case('integer'): $parameter_type = PDO::PARAM_INT; break;
								case('boolean'): $parameter_type = PDO::PARAM_BOOL; break;
								case('null'): $parameter_type = PDO::PARAM_NULL; break;
								default: $parameter_type = PDO::PARAM_STR; break;
							}
							$target_key = str_replace(array(':'), array(''), $target_key);
							$query->bindValue($target_key, $target_value, $parameter_type);
						}
						$result = $query->execute();
						self::$current_process = $query;
						self::$wheres = array();
						return($result);
					}catch(PDOException $error){
						Framework\Logs::Warning('Database Connection Has a Problem. Please Check it');
						self::$debug_errors ? self::Debuging($error) : '';
						return false;
					}
				}else{
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Execute::class);
}
?>