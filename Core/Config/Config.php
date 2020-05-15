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
	if(!class_exists('Config')){
		// Config Class for Getting Configs that Define By LaunchPad or Yourself
		class Config extends LaunchPad {
			// __callStatic Use for Get Method that You Want Config Load from there
			// this way is for Your Custom Config Files for When You Want Declare and Get them do not Have any Problem
			// @param String $configuration_section | default Empty
			// @param Array $configuration_part | default Array()
			// return Mixed
			public static function __callStatic(String $configuration_section = '', Array $configuration_part = array()){
				$if_not_exists = isset($configuration_part[1]) ? $configuration_part[1] : null;
				$asd = $configuration_part;
				$configuration_part = $configuration_part[0];
				$configuration_part = Safe::Trim($configuration_part);
				$configuration_section = Safe::Lower_Case($configuration_section);
				if(Validator::IsNullOrEmpty($configuration_part)){
					$if_not_exists = Validator::IsNullOrEmpty($if_not_exists) ? null : $if_not_exists;
					return($if_not_exists);
				}else{
					$core_section = (isset(self::$configs[$configuration_section]) AND is_array(self::$configs[$configuration_section]) AND count(self::$configs[$configuration_section]) >= 1) ? array_keys(self::$configs[$configuration_section]) : array();
					if(is_array($core_section) AND !in_array($configuration_part, $core_section)){
						$if_not_exists = Validator::IsNullOrEmpty($if_not_exists) ? null : $if_not_exists;
						return($if_not_exists);
					}else{
						$configuration_part = self::$configs[$configuration_section][$configuration_part];
						return($configuration_part);
					}
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Config::class);
}
?>