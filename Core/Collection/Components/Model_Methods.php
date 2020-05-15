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

namespace TkStar\LaunchPad\Web\Components\Collection {
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Collection\Model_Methods')){
		// Model Methods for Collections That Inherited Database Object
		trait Model_Methods {
			// Get Current Data and Save it to Collection in Database
			// @no_param
			// return Bool
			public function Save() : Bool {
				$access_permit = $this->access_permit;
				$access_permit_name = array_keys($access_permit);
				$access_permit_name = $access_permit_name[0];
				Framework\Database::Table($this->target);
				Framework\Database::Where($access_permit_name, $access_permit[$access_permit_name]);
				$result = Framework\Database::Update($this->data);
				return($result);
			}
			// Save new Data for Collection in Database
			// @param Mixed $key | default Empty
			// @param Mixed $value | default Empty
			// return Bool
			public function Update($key = '', $value = '') : Bool {
				$access_permit = $this->access_permit;
				$access_permit_name = array_keys($access_permit);
				$access_permit_name = $access_permit_name[0];
				Framework\Database::Table($this->target);
				Framework\Database::Where($access_permit_name, $access_permit[$access_permit_name]);
				$result = is_array($key) ? Framework\Database::Update($key) : Framework\Database::Update($key, $value);
				return($result);
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Collection\Model_Methods::class);
}
?>