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
	if(!class_exists('Logs')){
		// Logs Class for Logging LaunchPad Completion Steps
		class Logs extends LaunchPad {
			// @property Array $warnings | default array()
			public static $warnings = array();
			// @property Array $errors | default array()
			public static $errors = array();
			// @property Array $infos | default array()
			public static $infos = array();
			// Insert Log
			// @param String $log | default Empty
			// @param String $type | default = info
			// return Boolean
			public static function Insert(String $log = '', String $type = 'info') : Bool {
				if(!Validator::IsNullOrEmpty($log) AND in_array($type, array('warnings', 'errors', 'infos', 'warning', 'error', 'info', 'w', 'e', 'i'))){
					$type = ($type == 'warning' OR $type == 'w') ? 'warnings' : $type;
					$type = ($type == 'error' OR $type == 'e') ? 'errors' : $type;
					$type = ($type == 'info' OR $type == 'i') ? 'infos' : $type;
					$count = count(self::$$type);
					$time = microtime();
					$index = $time . '_' . $count;
					self::$$type[$index] = $log;
					self::Cli_Log($log);
					return true;
				}else{
					return false;
				}
			}
			// Insert Log into Client Console
			// @param String $log | default Empty
			// return Boolean
			public static function Cli_Log(String $log = '') : Bool {
				if(System::IsCli()){
					$new_line = chr(10);
					echo($log . $new_line);
					return true;
				}else{
					return false;
				}
			}
			// Insert Warning Log
			// @param String $log | default Empty
			// return Boolean
			public static function Warning(String $log = '') : Bool {
				return(self::Insert($log, 'w'));
			}
			// Insert Warning Log
			// @param String $log | default Empty
			// return Boolean
			public static function Error(String $log = '') : Bool {
				return(self::Insert($log, 'e'));
			}
			// Insert Warning Log
			// @param String $log | default Empty
			// return Boolean
			public static function Info(String $log = '') : Bool {
				return(self::Insert($log, 'i'));
			}
			// Get All Logs as Array
			// @no_param
			// Return Array
			public static function Get() : Array {
				$logs = array();
				$logs['warnings'] = self::$warnings;
				$logs['errors'] = self::$errors;
				$logs['infos'] = self::$infos;
				settype($logs, 'Array');
				return($logs);
			}
			// Get All Warnings as Array
			// also You can Use self::$warnings for Getting Warnings Logs
			// @no_param
			// Return Array
			public static function Warnings() : Array {
				$warnings = self::$warnings;
				settype($warnings, 'Array');
				return($warnings);
			}
			// Get All Errors as Array
			// also You can Use self::$errors for Getting Errors Logs
			// @no_param
			// Return Array
			public static function Errors() : Array {
				$errors = self::$errors;
				settype($errors, 'Array');
				return($errors);
			}
			// Get All Infos as Array
			// also You can Use self::$infos for Getting Infos Logs
			// @no_param
			// Return Array
			public static function Infos() : Array {
				$infos = self::$infos;
				settype($infos, 'Array');
				return($infos);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Logs::class);
}
?>