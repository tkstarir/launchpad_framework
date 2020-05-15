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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Result')){
		// Query Select Result Method Based on PDO
		trait Result {
			// Get Result of Select Queries as Array
			// @param Boolean $all | default false
			// return Mixed
			private static function Result(Bool $all = false){
				$target = self::Target();
				$result = $all ? self::$current_process->fetchAll(self::$fetch_type) : self::$current_process->fetch(self::$fetch_type);
				if(self::$aggregate == false){
					$collaction = array();
					foreach($result as $key => $value){
						if(is_array($value)){
							$value_keys = array_keys($value);
							if(in_array(self::$ai_column, $value_keys)){
								$access_permit_key = self::$ai_column;
							}else{
								if(isset($value_keys[0])){
									$access_permit_key = $value_keys[0];
								}else{
									$current = current($value_keys);
									$access_permit_key = !Framework\Validator::IsNullOrEmpty($current) ? $current : '';
								}
							}
							if(isset($value[self::$ai_column])){
								$access_permit_value = $value[self::$ai_column];
							}else{
								if(isset($value[0])){
									$access_permit_value = $value[0];
								}else{
									$current = current($value);
									$access_permit_value = !Framework\Validator::IsNullOrEmpty($current) ? $current : '';
								}
							}
							$access_permit = array($access_permit_key => $access_permit_value);
							$collaction_object = new \TkStar\LaunchPad\Web\Collection;
							$collaction_object->data = $value;
							$collaction_object->access_permit = $access_permit;
							$collaction_object->target = $target;
							$collaction[] = $collaction_object;
						}else{
							$collaction[] = $value;
						}
					}
				}else{
					$collaction = end($result);
				}
				self::Reset();
				return($collaction);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Result::class);
}
?>