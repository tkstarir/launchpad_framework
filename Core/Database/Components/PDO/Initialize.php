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
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Initialize')){
		// Initialize Method for Connection Based on PDO
		trait Initialize {
			// Initialize Query for Execution. Combine Wheres, Order By, Limitation and Offset and Return Targets
			// This Method is For LaunchPad Processes !
			// @param String $type | default select
			// @param Mixed $parameters
			// return Array
			private static function Initialize(String $type = 'SELECT', $parameters) : Array {
				switch($type){
					case('SELECT'):
						if(is_array($parameters)){
							$selects = array();
							foreach($parameters as $parameter){
								$parameter = str_replace(array('`'), array(''), $parameter);
								if($parameters == '*'){
									$selects = array('*');
									break;
								}else{
									$selects[] = '`' . self::Appellation($parameter, 'column') . '`';
								}
							}
							$selects = join(', ', $selects);
							$query = 'SELECT ' . $selects . ' FROM `' . self::$table . '`';
						}elseif(is_string($parameters)){
							$parameters = str_replace(array('`'), array(''), $parameters);
							$parameters = $parameters != '*' ? self::Appellation($parameters, 'column') : '*';
							$parameters_temp = Framework\Safe::Lower_Case($parameters);
							$condition = mb_substr($parameters_temp, 0, 3, self::$charset) == 'avg' OR mb_substr($parameters_temp, 0, 5, self::$charset) == 'count' OR mb_substr($parameters_temp, 0, 3, self::$charset) == 'max' OR mb_substr($parameters_temp, 0, 3, self::$charset) == 'min' OR mb_substr($parameters_temp, 0, 3, self::$charset) == 'sum';
							$query = $condition ? 'SELECT ' . $parameters . ' FROM `' . self::$table . '`' : 'SELECT ' . $parameters . ' FROM `' . self::$table . '`';
						}
						if(count(self::$joins) >= 1){
							foreach(self::$joins as $join){
								switch($join['type']){
									case('join'): $join_cmd = 'INNER JOIN'; break;
									case('left_join'): $join_cmd = 'LEFT JOIN'; break;
									case('right_join'): $join_cmd = 'RIGHT JOIN'; break;
									case('cross_join'): $join_cmd = 'CROSS JOIN'; break;
									default: return(array()); break;
								}
								if(in_array($join['type'], array('join', 'left_join', 'right_join'))){
									if(in_array($join['operator'], self::$valid_operators)){
										$second_table = $join['second_table'];
										$second_table = self::Appellation($second_table);
										if(strpos($join['left_column'], '.') !== false){
											$left_column = explode('.', $join['left_column']);
											$left_column[0] = self::Appellation($left_column[0]);
											$left_column[0] = '`' . $left_column[0] . '`';
											$left_column[1] = '`' . $left_column[1] . '`';
											$left_column = join('.', $left_column);
										}else{
											$left_column = self::Appellation($join['left_column']);
										}
										if(strpos($join['right_column'], '.') !== false){
											$right_column = explode('.', $join['right_column']);
											$right_column[0] = self::Appellation($right_column[0]);
											$right_column[0] = '`' . $right_column[0] . '`';
											$right_column[1] = '`' . $right_column[1] . '`';
											$right_column = join('.', $right_column);
										}else{
											$right_column = self::Appellation($join['right_column']);
										}
										$query = $query . ' ' . $join_cmd . ' `' . $second_table . '` ON ' . $left_column . ' ' . $join['operator'] . ' ' . $right_column;
									}else{
										return(array());
									}
								}elseif($join['type'] == 'cross_join'){
									$second_table = $join['second_table'];
									$second_table = self::Appellation($second_table);
									$query = $query . ' ' . $join_cmd . ' `' . $second_table . '`';
								}else{
									return(array());
								}
							}
						}
						break;
					case('UPDATE'):
						$updates = array();
						$updates_count = 0;
						foreach($parameters as $key => $value){
							$updates_count++;
							$key = str_replace(array('`'), array(''), $key);
							$key = str_replace(array('`'), array(''), $key);
							$key = self::Appellation($key, 'column');
							if(preg_match('/\`(.*)\`/imu', $value)){
								$target = $value;
							}else{
								$target = ':update_' . $updates_count;
								self::$targets[$target] = $value;
							}
							$updates[] = '`' . $key . '` = ' . $target;
						}
						$query = 'UPDATE `' . self::$table . '` SET ' . join(', ', $updates);
						break;
					case('DELETE'):
						$query = 'DELETE FROM `' . self::$table . '`';
						break;
				}
				self::$initializes_count++;
				if(count(self::$wheres) >= 1){
					$wheres = ' WHERE';
					$targets = array();
					$wheres_count = 0;
					foreach(self::$wheres as $where_key => $where_value){
						if(array_key_exists('where', $where_value) AND array_key_exists('if', $where_value) AND array_key_exists('operator', $where_value) AND array_key_exists('type', $where_value)){
							$type = Framework\Safe::Upper_Case($where_value['type']);
							$start_type = $wheres_count != 0 ? $type : '';
							$where_value['where'] = str_replace(array('`'), array(''), $where_value['where']);
							$where_value['operator'] = str_replace(array('`'), array(''), $where_value['operator']);
							if(preg_match('/\`(.*)\`/imu', $where_value['if'])){
								$target = $where_value['if'];
							}else{
								if(is_null($where_value['if'])){
									$target = 'NULL';
									$where_value['operator'] = $where_value['operator'] == '=' ? 'IS' : 'IS NOT';
								}else{
									$target = ':target_' . self::$initializes_count . '_' . $wheres_count;
									$targets[$target] = $where_value['if'];
								}
							}
							$wheres = $wheres . ' ' . $start_type . ' `' . self::Appellation($where_value['where'], 'column') . '` ' . $where_value['operator'] . ' ' . $target . ' ';
							$wheres_count++;
						}elseif(array_key_exists('where_between', $where_value) AND array_key_exists('betweens', $where_value) AND array_key_exists('type', $where_value)){
							$type = Framework\Safe::Upper_Case($where_value['type']);
							$start_type = $wheres_count != 0 ? $type : '';
							$where_value['where_between'] = str_replace(array('`'), array(''), $where_value['where_between']);
							$where_value['betweens'][0] = str_replace(array('`'), array(''), $where_value['betweens'][0]);
							$where_value['betweens'][1] = str_replace(array('`'), array(''), $where_value['betweens'][1]);
							$wheres = $wheres . ' ' . $start_type . ' `' . self::Appellation($where_value['where_between'], 'column') . '` BETWEEN ' . $where_value['betweens'][0] . ' AND ' . $where_value['betweens'][1];
							$wheres_count++;
						}elseif((array_key_exists('where_like', $where_value) OR array_key_exists('where_not_like', $where_value)) AND array_key_exists('if', $where_value) AND array_key_exists('type', $where_value)){
							$type = Framework\Safe::Upper_Case($where_value['type']);
							$start_type = $wheres_count != 0 ? $type : '';
							$where_value['if'] = str_replace(array('%'), array(''), $where_value['if']);
							$where_if = array_key_exists('where_not_like', $where_value) ? $where_value['where_not_like'] : $where_value['where_like'];
							$where_if = self::Appellation($where_if, 'column');
							$like = array_key_exists('where_not_like', $where_value) ? 'NOT LIKE' : 'LIKE';
							$wheres = $wheres . ' ' . $start_type . ' `' . $where_if . '` ' . $like . ' \'%' . $where_value['if'] . '%\'';
							$wheres_count++;
						}elseif((array_key_exists('where_in', $where_value) OR array_key_exists('where_not_in', $where_value)) AND array_key_exists('in', $where_value) AND array_key_exists('type', $where_value)){
							$type = Framework\Safe::Upper_Case($where_value['type']);
							$start_type = $wheres_count != 0 ? $type : '';
							$where_if = array_key_exists('where_not_in', $where_value) ? $where_value['where_not_in'] : $where_value['where_in'];
							$where_if = self::Appellation($where_if, 'column');
							$in = array_key_exists('where_not_in', $where_value) ? 'NOT IN' : 'IN';
							$wheres = $wheres . ' ' . $start_type . ' `' . $where_if . '` ' . $in . ' (' . $where_value['in'] . ')';
							$wheres_count++;
						}elseif(is_array($where_value)){
							$wheres = $wheres . ' (';
							foreach($where_value as $key => $value){
								if(array_key_exists('where', $value) AND array_key_exists('if', $value) AND array_key_exists('operator', $value) AND array_key_exists('type', $value)){
									$type = Framework\Safe::Upper_Case($value['type']);
									$value['where'] = str_replace(array('`'), array(''), $value['where']);
									$value['if'] = str_replace(array('`'), array(''), $value['if']);
									$value['operator'] = str_replace(array('`'), array(''), $value['operator']);
									$target = ':target_' . self::$initializes_count . '_' . $wheres_count;
									$targets[$target] = $value['if'];
									$wheres = $wheres . ' `' . self::Appellation($value['where'], 'column') . '` ' . $value['operator'] . ' ' . $target . ' ' . $type;
									$wheres_count++;
								}else{
									continue;
								}
							}
							$wheres = $wheres . ')';
						}else{
							continue;
						}
					}
				}else{
					$wheres = '';
					$targets = array();
				}
				$query = $query . $wheres;
				if(in_array($type, array('SELECT'))){
					$unions = !Framework\Validator::IsNullOrEmpty(self::$unions) ? self::$unions : '';
					$query = $query . ' ' . $unions;
				}
				$query = !Framework\Validator::IsNullOrEmpty(self::$group_by) ? $query . ' GROUP BY `' . self::$group_by . '`' : $query;
				if(count(self::$order_by) >= 1){
					$order_by = self::$order_by;
					$asc_or_desc = count(self::$asc_or_desc) <= 0 ? array('DESC') : self::$asc_or_desc;
					if(count($asc_or_desc) == 1){
						foreach($order_by as $key => $value){
							$order_by[$key] = '`' . $value . '`';
						}
						$order_by = join(', ', $order_by);
						$asc_or_desc = join('', $asc_or_desc);
						$asc_or_desc = Framework\Validator::IsNullOrEmpty($asc_or_desc) ? '' : ' ' . $asc_or_desc;
						$order_by = 'ORDER BY ' . $order_by . $asc_or_desc;
						$query = $query . ' ' . $order_by;
					}elseif(count($asc_or_desc) == count($order_by)){
						foreach($order_by as $key => $value){
							$order_by[$key] = '`' . $value . '` ' . $asc_or_desc[$key];
						}
						$order_by = join(', ', $order_by);
						$order_by = 'ORDER BY ' . $order_by;
						$query = $query . ' ' . $order_by;
					}
				}
				if(self::$limit >= 1 AND !is_null(self::$offset) AND self::$offset >= 0){
					$limit = self::$offset . ', ' . self::$limit;
					$query = $query . ' LIMIT ' . $limit;
				}elseif(self::$limit >= 1){
					$query = $query . ' LIMIT ' . self::$limit;
				}
				$query = self::Clean_Query($query);
				self::$targets = array_merge($targets, self::$targets);
				$statements = array('query' => $query, 'targets' => self::$targets);
				self::$limit = 0;
				self::$offset = null;
				self::$order_by = array();
				self::$asc_or_desc = array();
				self::$group_by = '';
				self::$wheres = array();
				self::$havings = array();
				self::$aggregate = false;
				return($statements);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Initialize::class);
}
?>