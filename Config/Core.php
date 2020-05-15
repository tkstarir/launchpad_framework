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
	/*
		----------------------------------------------------------------------------------------
		Core Config Variebles for Pure LaunchPad. you Can Change the Values and Add Custom Varieble
		Explanations of Default Variebles
		----------------------------------------------------------------------------------------

		[String Charset] (Cannot be Empty or Null)
			Framework Charset. Using for "mbstring" Extensions and Such as Them
			Default: UTF-8
			Example: iso-8859-1

		[String Charset_Non_Dashed] (Cannot be Empty or Null)
			Framework Charset Without Dash. Can be Use to Set Charset Like For "htmlentities", "html_entity_decode" & ...
			Default: UTF8
			Example: iso-8859-1
			This Value Cannot be Empty

		[String Sessions_Prefix] (Can be Empty or Null)
			Sessions Prefix
			Default: Session_
			Example: LaunchPad_

		[String Cookies_Prefix] (Can be Empty or Null)
			Cookies Prefix
			Default: Cookie_
			Example: LaunchPad_

		[String Timezone] (Can be Empty or Null)
			Time Zone for Set Date and Time to a Specified Region
			Default: Asia/Tehran
			Example: UTC

		[Array Special_Characters] (Can be Empty or Null)
			Special Characters for New Line, New Row, New Tab indent and Combination of These
			Don't Touch this Value Unless Necessary
			New Line: chr(10) = \n
			New Row: chr(13) = \r
			New Tab Indent: chr(9) = \t

		[Boolean Debuging] (Can be Empty or Null)
			Showing Errors of PHP for Develop Prescription
			Default: true
			Valid Values:
				- if Choose a Status except of Following Statuses, Default Status Will be set To False
				true: Show Notices, Warnings, Errors, UncoughtErrors & ...
				false: Hide Notices, Warnings, Errors, UncoughtErrors & ...

		[Boolean Logs] (Can be Empty or Null)
			Showing Logs of PHP for Develop Prescription
			Default: true
			Valid Values:
				- if Choose a Status except of Following Statuses, Default Status Will be set To False
				true: Show Errors, Infos, Warnings
				false: Hide Errors, Infos, Warnings

		[String Time_Limit] (Can be Empty or Null)
			Max Execution Time for Requests and Processes by Seconds
			Default: 0
			Example: 86400

		[Bool Sessions_Status] (Can be Empty or Null)
			Sessions Status for LaunchPad
			Default: true
			Valid Values:
				- if Choose a Status except of Following Statuses, Default Status Will be set To True
				true: Startign Sessions with Optional Type (Sessions_Type)
				false: Not Starting Sessions

		[String Sessions_Type] (Cannot be Empty or Null)
			Sessions Start Type for LaunchPad
			Default: session_start
			Valid Values:
				- if Choose a type except of Following Types, Sessions Not Start
				session_start: Start Sessions for All-Time
				session_write_close: Start Sessions and Declare/Clear all Sessions at End of App Process
	*/
	return(array(
		'Charset' => 'UTF-8',
		'Charset_Non_Dashed' => 'UTF8',
		'Sessions_Prefix' => 'Session_',
		'Cookies_Prefix' => 'Cookie_',
		'Timezone' => 'Asia/Tehran',
		'Special_Characters' => array('L' => chr(10), 'R' => chr(13), 'T' => chr(9), 'LL' => chr(10) . chr(10), 'RR' => chr(13) . chr(13), 'TT' => chr(9) . chr(9), 'LR' => chr(10) . chr(13), 'RL' => chr(13) . chr(10), 'LT' => chr(10) . chr(9), 'TL' => chr(9) . chr(10), 'TR' => chr(9) . chr(13), 'RT' => chr(13) . chr(9), 'NRT' => chr(10) . chr(13) . chr(9), 'NTR' => chr(10) . chr(9) . chr(13), 'TRN' => chr(9) . chr(13) . chr(10), 'TNR' => chr(9) . chr(10) . chr(13), 'RTN' => chr(13) . chr(9) . chr(10), 'RNT' => chr(13) . chr(10) . chr(9)),
		'Debuging' => true,
		'Logs' => false,
		'Time_Limit' => '0',
		'Sessions_Status' => true,
		'Sessions_Type' => 'session_start'
	));
}
?>