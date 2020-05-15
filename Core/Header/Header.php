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
	if(!class_exists('Header')){
		// Header Class for Process and Setting Up Headers And Custom Headers
		class Header extends LaunchPad {
			// Get All Headers in Request
			// @no_param
			// return Array
			public static function All() : Array {
				$headers = getallheaders();
				settype($headers, 'Array');
				return($headers);
			}
			// Add Custom Header in Headers
			// @param String $header_name | default Empty
			// @param String $header_value | default Empty
			// return Boolean
			public static function Add(String $header_name = '', String $header_value) : Bool {
				$header_name = Safe::Trim($header_name);
				$header_value = Safe::Trim($header_value);
				if(!Validator::IsNullOrEmpty($header_name) AND !Validator::IsNullOrEmpty($header_value)){
					header($header_name . ': ' . $header_value);
					return true;
				}else{
					return false;
				}
			}
			// Add Multiple Headers
			// @param Array $headers | default array();
			// return Boolean
			public static function Add_Multi(Array $headers) : Bool {
				if(count($headers) <= 0){
					return false;
				}else{
					$add_any_header = false;
					$headers = Safe::Trim($headers);
					foreach($headers as $header_name => $header_value){
						$add_any_header = self::Add($header_name, $header_value) ? true : false;
					}
					return($add_any_header);
				}
			}
			// Setting Content Type for a Page or Controller
			// @param String $content_type | default Empty
			// return Boolean
			public static function Content_Type(String $content_type = '') : Bool {
				$content_type = self::Get_Content_Type($content_type);
				if($content_type == 'invalid_content_type'){
					return false;
				}else{
					header('Content-Type: ' . $content_type . '; Charset=' . self::$charset);
					return true;
				}
			}
			// Get Content Type of an Extension By it Name
			// @param String $content_type | default Empty
			// return String
			public static function Get_Content_Type(String $extension = 'none') : String {
				$mimes = Config::Mimes('Allowed_Mimes');
				$extension = Safe::Lower_Case($extension);
				$content_type = isset($mimes[$extension]) ? $mimes[$extension] : '';
				settype($content_type, 'String');
				return($content_type);
			}
			// Setting Header Status By it Number Such 404, 403 and ...
			// @param Int $header_status | default 0
			// return Boolean
			public static function Header_Status(Int $header_status = 0) : Bool {
				$header_status = self::Get_Header_Status($header_status);
				if(Validator::IsNullOrEmpty($header_status)){
					return false;
				}else{
					header($header_status);
					return true;
				}
			}
			// Get Header Status By it Code Such as 404, 403 and ...
			// @param Int $header_status | default 0
			// return String
			public static function Get_Header_Status(Int $header_status = 0) : String {
				$header_status = Safe::Trim($header_status);
				switch($header_status){
					case('200'): case(200): $header_status = 'HTTP/1.1 200 OK'; break;
					case('301'): case(301): $header_status = 'HTTP/1.0 301 Moved Permanently'; break;
					case('302'): case(302): $header_status = 'HTTP/1.0 302 Moved Temporarily'; break;
					case('400'): case(400): $header_status = 'HTTP/1.0 400 Bad Request'; break;
					case('401'): case(401): $header_status = 'HTTP/1.0 401 Unauthorized'; break;
					case('403'): case(403): $header_status = 'HTTP/1.0 403 Forbidden'; break;
					case('404'): case(404): $header_status = 'HTTP/1.0 404 Not Found'; break;
					case('429'): case(429): $header_status = 'HTTP/1.0 429 Too Many Requests'; break;
					case('444'): case(444): $header_status = 'HTTP/1.0 444 Too No Response'; break;
					case('504'): case(504): $header_status = 'HTTP/1.0 504 Gateway Timeout'; break;
					case('505'): case(505): $header_status = 'HTTP/1.0 505 HTTP Version Not Supported'; break;
					default: $header_status = ''; break;
				}
				settype($header_status, 'String');
				return($header_status);
			}
			// Setting Content Length for Page in Headers
			// @param Float $length | default 0
			// return Boolean
			public static function Content_Length(Float $length = 0) : Bool {
				if(!empty($length) AND (is_double($length) OR is_float($length) OR is_numeric($length)) AND $length >= 1){
					header('Content-Length: ' . $length);
					return true;
				}else{
					return false;
				}
			}
			// Setting Disposition for Page in Headers
			// @param String $file_name | default Empty
			// return Boolean
			public static function Content_Disposition(String $file_name = '') : Bool {
				if(Validator::IsNullOrEmpty($file_name)){
					return false;
				}else{
					$file_name = Safe::Trim($file_name);
					header('Content-Disposition: attachment; filename=' . $file_name);
					return true;
				}
			}
			// Go or Redirect Function with Redirect Type to Specified 301 or 302 Type
			// @param String $url | default Empty
			// @param Int $redirect_type | default Null
			// return Boolean
			public static function Go(String $url = '', Int $redirect_type = null) : Bool {
				$url = String::Trim($url);
				if(Validator::IsNullOrEmpty($redirect_type)){
					header('Location: ' . $url);
					return true;
				}elseif($redirect_type == 301){
					header('Location: ' . $url, true, 301);
					return true;
				}elseif($redirect_type == 302){
					header('Location: ' . $url, true, 302);
					return true;
				}else{
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Header::class);
}
?>