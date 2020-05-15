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
	if(!class_exists('LaunchPad')){
		class LaunchPad {
			// @property String $charset | default 'default'
			public static $charset = 'default';
			// @property String $charset_non_dashed | default 'default'
			public static $charset_non_dashed = 'default';
			// @property Array $configs | default array()
			public static $configs = array();
			// @property Array $objects | default array()
			protected static $objects = array('cores' => array(), 'components' => array());
			// Return Clone of Self Class as Static for OOP Objects
			// @no_param
			// return \TkStar\LaunchPad\Web\Database
			private static function Static() : \TkStar\LaunchPad\Web\LaunchPad {
				$static = new Self();
				return($static);
			}
			// Load Core Classes and Their Components that Define by You or LaunchPad
			// @no_param
			// return Boolean
			public static function Core_Handle() : Bool {
				$cores = Directory . App_Folder . DS . 'Core' . DS . '*';
				$cores = glob($cores);
				$result = array_map(function($core_file) use ($cores){
					try{
						$files = array();
						$files = self::Components_Handle($files, $core_file);
						foreach($files as $file){
							$component = require_once($file);
							if(class_exists($component)){
								$component = new $component;
								self::$objects['cores'][] = $component;
							}else{
								self::$objects['traits'][] = $component;
							}
						}
						return true;
					}catch(Error $error){
						return false;
					}
				}, $cores);
				$result_boolean = false;
				foreach($result as $boolean){
					if($boolean === true){
						$result_boolean = false;
						continue;
					}else{
						$result_boolean = true;
						break;
					}
				}
				return($result_boolean);
			}
			// Sort Folders at First for an Array and Arrange Files After them
			// @param String $components_folder | default Empty
			// return Array
			public static function Sort_Components(String $components_folder = '') : Array {
				$sorted = array();
				$components_folder = $components_folder . DS . '*';
				$components_folder = glob($components_folder);
				foreach($components_folder as $component){
					is_dir($component) ? array_unshift($sorted, $component) : (is_file($component) ? array_push($sorted, $component) : '');
				}
				return($sorted);
			}
			// Get Fully Completely Components and Their Pieces that Define By You or LaunchPad, and Put them in Your Array and Return it
			// @param Array $components | default array()
			// @param String $core_file | default Empty
			// return Array
			public static function Components_Handle(Array $components = array(), String $core_file = '') : Array {
				$core_files = self::Sort_Components($core_file);
				foreach($core_files as $core_file){
					if(is_dir($core_file)){
						$components = self::Components_Handle($components, $core_file);
					}elseif(is_file($core_file)){
						$components[] = $core_file;
					}else{
						continue;
					}
				}
				return($components);
			}
			// Load Config Files that Define by You or LaunchPad
			// @no_param
			// return Boolean
			public static function Config_Handle() : Bool {
				$configs = Directory . App_Folder . DS . 'Config' . DS . '*';
				$configs = glob($configs);
				foreach($configs as $config){
					if(is_file($config)){
						$config_object = require_once($config);
						$config_var = $config;
						$config_var = explode(DS, $config_var);
						$config_var = end($config_var);
						$config_var = explode('.', $config_var);
						$config_var = current($config_var);
						$config_var = lcfirst($config_var);
						self::$configs[$config_var] = $config_object;
					}else{
						continue;
					}
				}
				return true;
			}
			// Load and Include Patterns Such as Models and Controllers for LaunchPad to You Can Use them Easily
			// @param String $path | default Empty
			// return Boolean
			public static function Patterns_Handle(String $path = '') : Bool {
				$path = Validator::IsNullOrEmpty($path) ? Directory . App_Folder . DS . 'Patterns' : $path;
				if(is_dir($path)){
					$controllers = glob($path . DS . '*');
					foreach($controllers as $controller){
						is_dir($controller) ? self::Patterns_Handle($controller) : require_once($controller);
					}
					return true;
				}else{
					return false;
				}
			}
			// Initialize The Database at First of App if You Want
			// You Can Disable First-time Activation of Database By Setting False for it Active Parameter
			// Whenever You Want you Can Active Database and This is not Important that You Set False for Database Active Parameter
			// @no_param
			// return Boolean
			public static function Database_Initialize() : Bool {
				$database_active = Config::Database('Active');
				if($database_active){
					if(Database::Active()){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
			// Bootstrap and Load LaunchPad Requirements and Files
			// @no_param
			// return Boolean
			public static function BootStrap() : Bool {
				self::Config_Handle();
				self::Core_Handle();
				self::Patterns_Handle();
				(in_array(self::$charset, array('def', 'default', 'empty', 'none', 'undefined', 'null', null))) ? self::$charset = Config::Core('Charset') : '';
				(in_array(self::$charset_non_dashed, array('def', 'default', 'empty', 'none', 'undefined', 'null', null))) ? self::$charset_non_dashed = Config::Core('Charset_Non_Dashed') : '';
				self::Sessions();
				self::Debuging();
				self::Time_Limits();
				self::Timezone();
				self::Database_Initialize();
				System::Initialize();
				Url::Initialize();
				Url::Initialize_Allowed_Characters();
				Logs::Info('Libraries Successfully Loaded');
				Logs::Info('Configs Successfully Loaded');
				Logs::Info('LaunchPad BootStrap Successfully Finished !');
				return true;
			}
			// Activate Sessions for LaunchPad if You Want
			// @no_param
			// return Boolean
			private static function Sessions() : Bool {
				$sessions_status = Config::Core('Sessions_Status');
				if($sessions_status){
					$sessions_type = Config::Core('Sessions_Type');
					if(in_array($sessions_type, array('session_start', 'session_write_close'))){
						$sessions_type == 'session_start' ? session_start() : session_write_close();
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
			// Activate Debuging for LaunchPad if You Want
			// @no_param
			// return Boolean
			private static function Debuging() : Bool {
				$debuging = Config::Core('Debuging');
				$display_errors = $debuging ? 'On' : 'Off';
				$error_reporting = $debuging ? E_ALL : false;
				ini_set('display_errors', $display_errors);
				ini_set('display_startup_errors', $display_errors);
				error_reporting($error_reporting);
				return true;
			}
			// Set Time Limits that You Define in Core Config
			// @no_param
			// return Boolean
			private static function Time_Limits() : Bool {
				$time_limit = Config::Core('Time_Limit');
				$time_limit = Safe::Number($time_limit);
				if(!Validator::IsNullOrEmpty($time_limit)){
					ini_set('max_execution_time', $time_limit);
					set_time_limit($time_limit);
					return true;
				}else{
					return false;
				}
			}
			// Set Timezone that You Define in Core Config
			// @no_param
			// return Boolean
			private static function Timezone() : Bool {
				$timezone = Config::Core('Timezone');
				if(!Validator::IsNullOrEmpty($timezone)){
					$valid_timezones = timezone_identifiers_list();
					if(in_array($timezone, $valid_timezones)){
						ini_set('date.timezone', $timezone);
						date_default_timezone_set($timezone);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}
	}
}
?>