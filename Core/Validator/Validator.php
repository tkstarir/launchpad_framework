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
	if(!class_exists('Validator')){
		// a Validator for Validation of Anythink Such as Inputs, Methods and ...
		class Validator extends LaunchPad {
			// Check Your Inputs are Null or Empty or Have Any Value
			// @param Mixed $strins | default Empty
			// return Boolean
			public static function IsNullOrEmpty($strings = '') : bool {
				if(is_array($strings) OR is_object($strings)){
					$boolean = true;
					foreach($strings as $key => $value){
						if(self::IsNullOrEmpty($value)){
							$boolean = false;
							break;
						}else{
							$boolean = true;
							continue;
						}
					}
					settype($boolean, 'Bool');
					return($boolean);
				}else{
					$strings = Safe::Trim($strings);
					if(is_null($strings) OR empty($strings) OR (!is_string($strings) AND !is_numeric($strings) AND !is_double($strings) AND !is_float($strings) AND !is_array($strings) AND !is_object($strings))){
						return true;
					}else{
						return false;
					}
				}
			}
			// Check Your Inputs are Boolean or Not
			// @param Mixed $booleans | default true
			// return Boolean
			public static function Boolean($booleans = true, Bool $foreach_process = true) : Bool {
				if((is_array($booleans) OR is_object($booleans)) AND $foreach_process){
					$boolean = true;
					foreach($booleans as $key => $value){
						if(!self::Boolean($value, false)){
							$boolean = false;
							break;
						}else{
							$boolean = true;
							continue;
						}
					}
					settype($boolean, 'Bool');
					return($boolean);
				}else{
					$booleans = gettype($booleans);
					if($booleans == 'boolean'){
						return true;
					}else{
						return false;
					}
				}
			}
			// Check Your Inputs are a Valid Url or not
			// @param Mixed $urls | default Empty
			// return Mixed
			public static function Url($url = '') : Bool {
				if(is_array($booleans) OR is_object($booleans)){
					$boolean = true;
					foreach($booleans as $key => $value){
						if(!self::Url($value)){
							$boolean = false;
							break;
						}else{
							$boolean = true;
							continue;
						}
					}
					settype($boolean, 'Bool');
					return($boolean);
				}else{
					$url = Safe::Trim($url);
					if(mb_substr($url, 0, 7, self::$charset) == 'http://' OR mb_substr($url, 0, 8, self::$charset) == 'https://'){
						$exploded_url = explode('.', $url);
						if(count($exploded_url) == 2 OR count($exploded_url) == 3){
							if(filter_var($url, FILTER_VALIDATE_URL)){
								return true;
							}else{
								return false;
							}
						}else{
							return false;
						}
					}else{
						return false;
					}
				}
			}
			// Check Your Inputs are Boolean or Not
			// @param Mixed $hashs | default Empty
			// @param Mixed $hash_type | default 'md5'
			// return Boolean
			public static function Hash($hashs = '', String $hash_type = 'md5') : Bool {
				if(is_array($hashs) OR is_object($hashs)){
					$boolean = true;
					foreach($hashs as $key => $value){
						if(!self::Hash($value, $hash_type)){
							$boolean = false;
							break;
						}else{
							$boolean = true;
							continue;
						}
					}
					settype($boolean, 'Bool');
					return($boolean);
				}else{
					$hash_type = Safe::Lower_Case($hash_type);
					switch($hash_type){
						case('adler32'): case('crc32'): case('crc32b'): $output = preg_match('/^[a-f0-9]{8}$/imu', $hashs); break;
						case('md2'): case('md4'): case('md5'): case('ripemd128'): case('tiger128,3'): case('tiger128,4'): case('haval128,3'): case('tiger128,4'): case('haval128,4'): case('haval128,5'): $output = preg_match('/^[a-f0-9]{32}$/imu', $hashs); break;
						case('sha1'): case('ripemd160'): case('tiger160,3'): case('tiger160,4'): case('haval160,3'): case('haval160,4'): case('haval160,5'): $output = preg_match('/^[a-f0-9]{40}$/imu', $hashs); break;
						case('tiger192,3'): case('tiger192,4'): case('haval192,3'): case('haval192,4'): case('haval192,5'): $output = preg_match('/^[a-f0-9]{48}$/imu', $hashs); break;
						case('haval224,3'): case('haval224,4'): case('haval224,5'): $output = preg_match('/^[a-f0-9]{56}$/imu', $hashs); break;
						case('sha256'): case('sha512'): case('snefru'): case('gost'): case('haval256,3'): case('haval256,4'): case('haval256,5'): $output = preg_match('/^[a-f0-9]{64}$/imu', $hashs); break;
						case('whirlpool'): $output = preg_match('/^[a-f0-9]{128}$/imu', $hashs); break;
						default: $output = false; break;
					}
					settype($output, 'Bool');
					return($output);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Validator::class);
}
?>