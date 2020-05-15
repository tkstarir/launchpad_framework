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
	use \TkStar\LaunchPad\Web\Components\Collection as Component;
	if(!class_exists('Collection')){
		// Collection Class for Data that Save into Models and Sessions
		class Collection {
			// @trait \TkStar\LaunchPad\Web\Components\Collection\Result
			use Component\Model_Methods;
			// @property Array $data | default array()
			protected $data = array();
			// @property Array $access_permit | default array('id' => 0)
			protected $access_permit = array('id' => 0);
			// @property String $target | default Empty
			protected $target = '';
			// __toString Magic Method for Return JSON When Collection Use as String
			// @no_param
			// return String
			public function __toString() : String {
				$output = json_encode($this->data, JSON_UNESCAPED_UNICODE);
				return($output);
			}
			// __set Magic Method for Set Data to Collection
			// @param String $name | default Empty
			// @param Mixed $value | default Empty
			// return Boolean
			public function __set(String $name = '', $value = '') : Bool {
				if(!Validator::IsNullOrEmpty($name)){
					isset($this->$name) ? $this->$name = $value : $this->data[$name] = $value;
					return true;
				}else{
					return false;
				}
			}
			// __get Magic Method for Get Data From Collection
			// @param String $name | default Empty
			// return Mixed
			public function __get(String $name = ''){
				if($name == 'count'){
					if(is_numeric($this->data)){
						return($this->data);
					}else{
						$count = count($this->data);
						return($count);
					}
				}elseif(isset($this->data[$name])){
					return($this->data[$name]);
				}else{
					return false;
				}
			}
			// __unset Magic Method for Unseting a Data From Collection
			// @param String $name | default Empty
			// return Boolean
			public function __unset(String $name = '') : Bool {
				if(isset($this->data[$name])){
					unset($this->data[$name]);
					return true;
				}else{
					return false;
				}
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Collection::class);
}
?>