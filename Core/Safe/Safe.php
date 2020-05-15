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
	if(!class_exists('Safe')){
		// Safe Class for Safe Inputs, Methods and Database Queries
		class Safe extends LaunchPad {
			// Trim Inputs with "rtrim", "ltrim" and "trim" Limits
			// @param Mixed $strings | default Empty
			// @param Bool $rtrim | default true
			// @param Bool $ltrim | default true
			// @param Bool $trim | default true
			// return Mixed
			public static function Trim($strings = '', Bool $rtrim = true, Bool $ltrim = true, Bool $trim = true){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Trim($value, $rtrim, $ltrim, $trim);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = $rtrim ? rtrim($strings) : $strings;
					$strings = $ltrim ? ltrim($strings) : $strings;
					$strings = $trim ? trim($strings) : $strings;
					$strings = str_ireplace(array('  '), array(' '), $strings);
					$strings = strpos($strings, '  ') !== false ? self::Trim($strings) : $strings;
					settype($strings, 'String');
					return($strings);
				}
			}
			// Slash Remover for Urls and Inputs that Have Multiple Slash or Back Slashes
			// @param Mixed $strings | default Empty
			// return Mixed
			public static function Slash_Remover($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Slash_Remover($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = str_replace(array('//'), array('/'), $strings);
					$strings = str_replace(array('\\\\'), array('\\'), $strings);
					$strings = (strpos($strings, '//') !== false OR strpos($strings, '\\\\') !== false) ? self::Slash_Remover($strings) : $strings;
					settype($strings, 'String');
					return($strings);
				}
			}
			// String Function for Clean Inputs with String Type. This Function Can be Use For Clean XSS
			// @param Mixed $strings | default Empty
			// @param Bool $slash_remover | default true
			// return Mixed
			public static function String($strings = '', Bool $slash_remover = true){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::String($value, $slash_remover);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = self::Trim($strings);
					$strings = htmlentities($strings, ENT_QUOTES | ENT_IGNORE, self::$charset);
					$strings = $slash_remover ? self::Slash_Remover($strings) : $strings;
					settype($strings, 'String');
					return($strings);
				}
			}
			// Numberic Safe Function to Extract Only Numbers From Input
			// @param Mixed $number | default Empty
			// return Mixed
			public static function Number($numbers = '0'){
				if(is_array($numbers) OR is_object($numbers)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($numbers as $key => $value){
						$numbers[$key] = self::Number($value);
					}
					settype($numbers, $current_type);
					return($numbers);
				}else{
					$numbers = self::Trim($numbers);
					$numbers = preg_replace('/\D/imu', '', $numbers);
					settype($numbers, 'Int');
					return($numbers);
				}
			}
			// Convert Your Alphabetical Character Into Lower Case Style with This Function
			// This Function Need "mbstring" Extension
			// Use "mb_strtolower" Because of UTF-8 Characters
			// @param Mixed $strings | Default Empty
			// return Mixed
			public static function Lower_Case($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::LowerCase($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$charset = self::$charset;
					$charset = $charset == 'default' ? 'UTF8' : $charset;
					$strings = self::Trim($strings);
					$strings = mb_strtolower($strings, $charset);
					settype($strings, 'String');
					return($strings);
				}
			}
			// Convert Your Alphabetical Character Into Upper Case Style with This Function
			// This Function Need "mbstring" Extension
			// Use "mb_strtoupper" Because of UTF-8 Characters
			// @param Mixed $strings | Default Empty
			// return Mixed
			public static function Upper_Case($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$string[$key] = self::UpperCase($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$charset = self::$charset;
					$charset = $charset == 'default' ? 'UTF8' : $charset;
					$strings = self::Trim($strings);
					$strings = mb_strtoupper($strings, $charset);
					settype($strings, 'String');
					return($strings);
				}
			}
			// Remove Any Character (Prefix) From Your Object Keys
			// @param Mixed $obj | default array()
			// @param String $prefix | default Empty
			// return Mixed
			public static function Obj_Remove_Prefix($obj = array(), String $prefix = '', String $replace_to = ''){
				if(!Validator::IsNullOrEmpty($prefix) AND !Validator::IsNullOrEmpty($replace_to)){
					$prefix = self::Trim($prefix);
					$replace_to = self::Trim($replace_to);
					$current_type = gettype($obj);
					settype($obj, 'Array');
					foreach($obj as $obj_key => $obj_value){
						unset($obj[$obj_key]);
						$obj_key = strpos($obj_key, $prefix) !== false ? preg_replace('/' . $prefix . '/imu', $replace_to, $obj_key, 1) : $obj_key;
						$obj[$obj_key] = (is_array($obj_value) OR is_object($obj_value)) ? self::Obj_Remove_Prefix($obj_value, $prefix) : $obj_value;
					}
					settype($obj, $current_type);
					return($obj);
				}else{
					return($obj);
				}
			}
			// To Object Function for Converting Any Type to Object (stdClass)
			// @param Mixed $obj | default array();
			// return Object
			public static function ToObject($obj = array()) : Object {
				if(is_object($obj)){
					settype($obj, 'Object');
					return($obj);
				}else{
					$obj = json_encode($obj, JSON_UNESCAPED_UNICODE);
					$obj = json_decode($obj, false);
					settype($obj, 'Object');
					return($obj);
				}
			}
			// To Array Function for Converting Any Type to Array
			// @param Mixed $obj | default array();
			// return Array
			public static function ToArray($obj = array()) : Array {
				if(is_array($obj)){
					settype($obj, 'Array');
					return($obj);
				}else{
					$obj = json_encode($obj, JSON_UNESCAPED_UNICODE);
					$obj = json_decode($obj, true);
					settype($obj, 'Array');
					return($obj);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Safe::class);
}
?>