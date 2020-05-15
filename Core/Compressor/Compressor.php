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
	if(!class_exists('Compressor')){
		// Compressor Class for Compress HTML, CSS & JavaScripts that you Load With LaunchPad Engine in your Template
		class Compressor extends LaunchPad {
			// CSS Compressor
			// @param String $string | default Empty
			// return String
			public static function CSS(String $string = '') : String {
				$special_characters = Config::Core('Special_Characters');
				$replaced_characters = array($special_characters['L'] => ' ', $special_characters['R'] => ' ', $special_characters['T'] => ' ', $special_characters['LL'] => ' ', $special_characters['RR'] => ' ', $special_characters['TT'] => ' ', $special_characters['LR'] => ' ', $special_characters['RL'] => ' ', $special_characters['LT'] => ' ', $special_characters['TL'] => ' ', $special_characters['RT'] => ' ', $special_characters['NRT'] => ' ', $special_characters['NTR'] => ' ', $special_characters['TRN'] => ' ', $special_characters['TNR'] => ' ', $special_characters['TNR'] => ' ', $special_characters['RTN'] => ' ', $special_characters['RNT'] => '');
				$replaced_css_selectors = array(': active' => ':active', ': after' => ':after', ': before' => ':before', ': checked' => ':checked', ': disabled' => ':disabled', ': empty' => ':empty', ': enabled' => ':enabled', ': first-child' => ':first-child', ': first-letter' => ':first-letter', ': first-line' => ':first-line', ': first-of-type' => ':first-of-type', ': focus' => ':focus', ': hover' => ':hover', ': in-range' => ':in-range', ': invalid' => ':invalid', ': lang' => ':lang', ': last-child' => ':last-child', ': last-of-type' => ':last-of-type', ': link' => ':link', ': not' => ':not', ': nth-child' => ':nth-child', ': nth-last-child' => ':nth-last-child', ': nth-last-of-type' => ':nth-last-of-type', ': nth-of-type' => ':nth-of-type', ': only-of-type' => ':only-of-type', ': only-child' => ':only-child', ': optional' => ':optional', ': out-of-range' => ':out-of-range', ': read-only' => ':read-only', ': read-write' => ':read-write', ': required' => ':required', ': root' => ':root', ': selection' => ':selection', ': target' => ':target', ': valid' => ':valid', ': visited' => ':visited');
				foreach($replaced_characters as $key => $value){
					$string = preg_replace('/[' . $key . ']/imu', $value, $string);
				}
				$string = str_ireplace(array('{', '}', ';', ':', ',', '>'), array(' { ', ' } ', '; ', ': ', ', ', ' > '), $string);
				$string = str_ireplace(array(':: ', ' ::', ' : :', ': : ', ' : : '), array('::', '::', '::', '::', '::'), $string);
				$string = str_ireplace(array('!important'), array(' !important'), $string);
				foreach($replaced_css_selectors as $key => $value){
					$string = preg_replace('/' . $key . '/imu', $value, $string);
				}
				$string = str_ireplace(array('  '), array(' '), $string);
				$string = Safe::Trim($string);
				settype($string, 'String');
				return(!Validator::IsNullOrEmpty($string) ? $string : '');
			}
			// Javascript Compressor
			// @param String $string | default Empty
			// return String
			public static function Java_Script(String $string = '') : String {
				$special_characters = Config::Core('Special_Characters');
				$replaced_characters = array($special_characters['L'] => ' ', $special_characters['R'] => ' ', $special_characters['T'] => ' ', $special_characters['LL'] => ' ', $special_characters['RR'] => ' ', $special_characters['TT'] => ' ', $special_characters['LR'] => ' ', $special_characters['RL'] => ' ', $special_characters['LT'] => ' ', $special_characters['TL'] => ' ', $special_characters['RT'] => ' ', $special_characters['NRT'] => ' ', $special_characters['NTR'] => ' ', $special_characters['TRN'] => ' ', $special_characters['TNR'] => ' ', $special_characters['TNR'] => ' ', $special_characters['RTN'] => ' ', $special_characters['RNT'] => '');
				foreach($replaced_characters as $key => $value){
					$string = preg_replace('/[' . $key . ']/imu', $value, $string);
				}
				$string = str_ireplace(array('{', '}', ';', ','), array(' { ', ' } ', '; ', ', '), $string);
				$string = str_ireplace(array('elseif', 'else if'), array(' else if ', ' else if '), $string);
				$string = str_ireplace(array('==', '!=', '!==', '===', '&&', '||'), array(' == ', ' != ', ' !== ', ' === ', ' && ', ' || '), $string);
				$string = str_ireplace(array('  ', '! ', ' , ', '== =', '= ==', '= = ='), array(' ', '!', ', ', '===', '===', '==='), $string);
				$string = str_ireplace(array('  '), array(' '), $string);
				$string = Safe::Trim($string);
				settype($string, 'String');
				return(!Validator::IsNullOrEmpty($string) ? $string : '');
			}
		}
	}
	return(\TkStar\LaunchPad\Web\Compressor::class);
}
?>