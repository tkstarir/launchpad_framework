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
	if(!class_exists('Generate')){
		// Generator Class for Generate Strings, Numbers, Passwords & ...
		class Generate extends LaunchPad {
			// Generate Random String With Your Desired Length and Components
			// @param Int $length | default 12
			// @param Bool $uppercase_words | default true
			// @param Bool $numbers | default true
			// @param Bool $special_characters | default true
			// return String
			public static function Random(Int $length = 12, Bool $uppercase_words = true, Bool $numbers = true, Bool $special_characters = true) : String {
				$characters = 'abcdefghijklmnopqrstuvwxyz';
				$characters = $uppercase_words ? $characters . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : $characters;
				$characters = $numbers ? $characters . '1234567890' : $characters;
				$characters = $special_characters ? $characters . '!@#$%^&*()_+-=`~/\\\'"[]{}|?><,.' : $characters;
				$random = array();
				for($random_lenght = 0; $random_lenght < $length; $random_lenght++){
					$selected_offset_number = rand(0, (strlen($characters) - 1));
					$selected_offset = $characters[$selected_offset_number];
					$random[] = $selected_offset;
				}
				$random = join('', $random);
				settype($random, 'String');
				return($random);
			}
			// Generate Random Number With Your Desired Length
			// @param Int $length | default 12
			// @param Int $begin_with | default 0
			// @param Int $end_with | default 9
			// return String
			public static function Random_Number(Int $length = 12, Int $begin_with = 0, Int $end_with = 9) : String {
				$numbers = '1234567890';
				$numbers = preg_replace('/[^' . $begin_with . '-' . $end_with . ']/imu', '', $numbers);
				$number = array();
				for($numbers_length = 0; $numbers_length < $length; $numbers_length++){
					$selected_offset_number = rand(0, (strlen($numbers) - 1));
					$selected_offset = $numbers[$selected_offset_number];
					$number[] = $selected_offset;
				}
				$number = join('', $number);
				settype($number, 'String');
				return($number);
			}
			// Password Generator With LaunchPad Dedicated Algorithm
			// @param Mixed $strings | default Empty
			// @param Bool $wrapping | default true
			// return Mixed
			public static function Password($strings = '', Bool $wrapping = true){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Password($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Config::Core('Special_Characters');
					$strings = Safe::Trim($strings);
					$strings = 'TSL:' . self::Random(48, 'true', 'false', 'false') . $strings;
					$strings = bin2hex($strings);
					$strings = convert_uuencode($strings);
					$strings = str_ireplace(array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), $strings);
					$strings = str_rot13($strings);
					$strings = urlencode($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = $wrapping ? wordwrap($strings, 48, $special_characters['L'], true) : $strings;
					$strings = convert_uuencode($strings);
					$strings = bin2hex($strings);
					$strings = gzcompress($strings);
					$strings = bin2hex($strings);
					$strings = gzdeflate($strings);
					$strings = bin2hex($strings);
					$strings = gzencode($strings);
					$strings = bin2hex($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = $wrapping ? wordwrap($strings, 48, $special_characters['L'], true) : $strings;
					settype($strings, 'String');
					return($strings);
				}
			}
			// Password Decoder For Strings Encoded with LaunchPad Dedicated Algorithm
			// @param Mixed $strings | default Empty
			// @param Bool $wrapping | default true
			// return Mixed
			public static function Decode_Password($strings = '', Bool $wrapping = true) : String {
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Decode_Password($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Config::Core('Special_Characters');
					$strings = Safe::Trim($strings);
					$strings = $wrapping ? str_ireplace(array($special_characters['L']), array(''), $strings) : $strings;
					$strings = self::Decode_Base64($strings);
					$strings = hex2bin($strings);
					$strings = gzdecode($strings);
					$strings = hex2bin($strings);
					$strings = gzinflate($strings);
					$strings = hex2bin($strings);
					$strings = gzuncompress($strings);
					$strings = hex2bin($strings);
					$strings = convert_uudecode($strings);
					$strings = $wrapping ? str_ireplace(array($special_characters['L']), array(''), $strings) : $strings;
					$strings = self::Decode_Base64($strings);
					$strings = urldecode($strings);
					$strings = str_rot13($strings);
					$strings = str_ireplace(array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), $strings);
					$strings = convert_uudecode($strings);
					$strings = hex2bin($strings);
					$strings = preg_replace('/TSL\:[a-zA-Z0-9]{48}/imu', '', $strings);
					settype($strings, 'String');
					return($strings);
				}
			}
			// Url Generator With LaunchPad Dedicated Algorithm
			// @param Mixed $strings | default Empty
			// return Mixed
			public static function Url($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Url($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Config::Core('Special_Characters');
					$strings = Safe::Trim($strings);
					$strings = self::Base64($strings, 'encode');
					$strings = str_replace(array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), $strings);
					$strings = wordwrap($strings, 48, $special_characters['L'], true);
					$strings = convert_uuencode($strings);
					$strings = bin2hex($strings);
					$strings = gzcompress($strings);
					$strings = bin2hex($strings);
					$strings = gzdeflate($strings);
					$strings = bin2hex($strings);
					$strings = gzencode($strings);
					$strings = bin2hex($strings);
					settype($strings, 'String');
					return($strings);
				}
			}
			// Url Decoder For Strings Encoded with LaunchPad Dedicated Algorithm
			// @param Mixed $strings | default Empty
			// return Mixed
			public static function Decode_Url($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Decode_Url($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$special_characters = Config::Core('Special_Characters');
					$strings = Safe::Trim($strings);
					$strings = hex2bin($strings);
					$strings = gzdecode($strings);
					$strings = hex2bin($strings);
					$strings = gzinflate($strings);
					$strings = hex2bin($strings);
					$strings = gzuncompress($strings);
					$strings = hex2bin($strings);
					$strings = convert_uudecode($strings);
					$strings = str_ireplace(array($special_characters['L']), array(''), $strings);
					$strings = str_replace(array('T/', 't=', 'K_', 'k$', 'S-', 's+', 'A>', 'a.', 'R|', 'r~'), array('T', 't', 'K', 'k', 'S', 's', 'A', 'a', 'R', 'r'), $strings);
					$strings = self::Decode_Base64($strings);
					settype($strings, 'String');
					return($strings);
				}
			}
			// Hasher Function for Known Hash Algorithms of PHP
			// @param Mixed $strings | default Empty
			// @param String $hash_algoritm | default md5
			// @param Bool $raw_output | default false
			// return Mixed
			public static function Hasher(String $strings = '', String $hash_algoritm = 'md5', Bool $raw_output = false){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Hasher($value, $hash_algoritm, $raw_output);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Safe::Trim($strings);
					$hash_algoritms_array = hash_algos();
					$raw_output = is_null($raw_output) ? false : $raw_output;
					if(!in_array($hash_algoritm, $hash_algoritms_array)){
						return false;
					}else{
						$hash = hash($hash_algoritm, $strings, $raw_output);
						settype($hash, 'String');
						return($hash);
					}
				}
			}
			// Base64 Algorithm Encode Function
			// @param Mixed $strings | default Empty
			// return Mixed
			public static function Base64($strings = '') : String {
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Base64($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Safe::Trim($strings);
					$base64 = base64_encode($strings);
					settype($base64, 'String');
					return($base64);
				}
			}
			// Base64 Algorithm Decode Function
			// @param Mixed $strings | default Empty
			// return Mixed
			public static function Decode_Base64($strings = ''){
				if(is_array($strings) OR is_object($strings)){
					$current_type = gettype($strings);
					settype($strings, 'Array');
					foreach($strings as $key => $value){
						$strings[$key] = self::Decode_Base64($value);
					}
					settype($strings, $current_type);
					return($strings);
				}else{
					$strings = Safe::Trim($strings);
					$base64 = base64_decode($strings);
					settype($base64, 'String');
					return($base64);
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Generate::class);
}
?>