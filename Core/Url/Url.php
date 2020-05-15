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
	if(!class_exists('Url')){
		// Urll Class to Work with Tweaks and Routed Tweaks, Getting Tweaks String (REQUEST_URI), Convert a Url to Base Url and ...
		class Url extends LaunchPad {
			// @property Array $tweaks | default array()
			public static $tweaks = array();
			// @property Array $routed_tweaks | default array()
			public static $routed_tweaks = array();
			// @property Array $tweaks_string | default null
			public static $tweaks_string = null;
			// @property Array $routed_tweaks_string | default null
			public static $routed_tweaks_string = null;
			// @property Array $allowed_characters | default null
			public static $allowed_characters = null;
			// Tweaks Function for Get Tweaks By Them Indexes (Requested URIs)
			// @no_param
			// Return Boolean
			public static function Initialize() : Bool {
				if(isset($_SERVER['argc']) AND isset($_SERVER['argv'])){
					if(System::IsCli()){
						$tweaks = $_SERVER['argv'];
						$tweaks = Safe::String($tweaks);
						$tweaks = array_values($tweaks);
						$tweaks = join(DS, $tweaks);
					}else{
						$tweaks = !Validator::IsNullOrEmpty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
						$tweaks = Safe::Trim($tweaks);
					}
				}else{
					$tweaks = !Validator::IsNullOrEmpty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
				}
				$tweaks = Safe::Slash_Remover($tweaks);
				$tweaks = explode('/', $tweaks);
				foreach($tweaks as $tweak_key => $tweak_value){
					if(Validator::IsNullOrEmpty($tweak_value)){
						unset($tweaks[$tweak_key]);
					}else{
						continue;
					}
				}
				$tweaks = array_values($tweaks);
				ksort($tweaks);
				self::$tweaks = $tweaks;
				Logs::Info('Url Class Initialize');
				return true;
			}
			// Get Tweak By it Index
			// @param Int $tweaks | default = 0
			// return String
			public static function Tweaks(Int $tweak = 0) : String {
				$tweak = (isset(self::$tweaks[$tweak]) AND !Validator::IsNullOrEmpty(self::$tweaks[$tweak])) ? self::$tweaks[$tweak] : '';
				settype($tweak, 'String');
				return($tweak);
			}
			// Get Routed Tweaks By it Index
			// @param Int $routed_tweak | default = 0
			// return String
			public static function Routed_Tweaks(Int $routed_tweak = 0) : String {
				$routed_tweak = (isset(self::$routed_tweaks[$routed_tweak]) AND !Validator::IsNullOrEmpty(self::$routed_tweaks[$routed_tweak])) ? self::$routed_tweaks[$routed_tweak] : '';
				settype($routed_tweak, 'String');
				return($routed_tweak);
			}
			// Get Routed Tweaks as Array
			// also You can Use self::$tweaks for Getting Tweaks
			// @no_param
			// return Array
			public static function All_Tweaks() : Array {
				$tweaks = self::$tweaks;
				settype($tweaks, 'Array');
				return($tweaks);
			}
			// Get Routed Tweaks as Array
			// also You can Use self::$routed_tweaks for Getting Tweaks
			// @no_param
			// return Array
			public static function All_Routed_Tweaks() : Array {
				$routed_tweaks = self::$routed_tweaks;
				settype($routed_tweaks, 'Array');
				return($routed_tweaks);
			}
			// Return Request Uri or Real Tweaks as String
			// also You can Use self::$tweaks_string for Getting Tweaks String
			// @no_param
			// return String
			public static function Tweaks_String() : String {
				$tweaks_string = self::$tweaks_string;
				settype($tweaks_string, 'String');
				return($tweaks_string);
			}
			// Return Routed Tweaks or Routed Directory dad You Define as String
			// also You can Use self::$routed_tweaks_string for Getting Routed Tweaks String
			// @no_param
			// return String
			public static function Routed_Tweaks_String() : String {
				$routed_tweaks_string = self::$routed_tweaks_string;
				settype($routed_tweaks_string, 'String');
				return($routed_tweaks_string);
			}
			// Initialize Allowed Characters
			// @no_param
			// return Boolean
			public static function Initialize_Allowed_Characters() : Bool {
				$tweaks = self::All_Tweaks();
				self::$allowed_characters = Config::Url('Allowed_Characters');
				if(!is_null(self::$allowed_characters)){
					self::$tweaks_string = count($tweaks) == 0 ? DS : join(DS, $tweaks);
					foreach($tweaks as $tweak){
						if(!Validator::IsNullOrEmpty($tweak)){
							if(!preg_match('/^[' . self::$allowed_characters . ']+$/imu', $tweak)){
								Show::Error('HTML', '400', 'Bad Request for Tweaks (Request Uri)');
							}else{
								continue;
							}
						}
					}
					Logs::Info('Url Allowed Characters Initialized & Processed');
					return true;
				}else{
					Logs::Warning('Url Allowed Characters Hasen\'t an Acceptable Value. Please Check it');
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Url::class);
}
?>