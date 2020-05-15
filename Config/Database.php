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
		Database Config Variebles for Pure LaunchPad. you Can Change the Values and Add Custom Varieble
		Explanations of Default Variebles
		----------------------------------------------------------------------------------------
		
		[Boolean Active] (Cannot be Empty or Null)
			Tell to you want Database Connection Initialize or not at Beginning of LaunchPad_Values
			Default: true
			Valid Values:
				- if Choose a Status except of Following Statuses, Database not Initialize
				- if You Choose false, Database not Initialize at BootStrap but Whenever You want, You can Active it
				true: Database Initialize
				false: Database not Initialize
		
		[String Server] (Cannot be Empty or Null)
			Hostname or Server that Database Drivers must be Connect to it
			Default: localhost
			Example: 0.0.0.0:3306
		
		[String Username] (Cannot be Empty or Null)
			Username that Database Drivers must be Connect to it
			Example: root
		
		[String Password] (Cannot be Empty or Null)
			Password that Database Drivers must be Connect to it
			Example: 1234567890

		[String Database] (Cannot be Empty or Null)
			Database Section that Database Drivers must be Connect to it
			Example: test

		[Int Port] (Cannot be Empty or Null)
			Database Driver Port that Libraries must be Connect to it
			Default: 3306 (for mysqld)
			Example: 9999

		[String Connection_Type] (Cannot be Empty or Null)
			Database Library that You Want to Connect to it
			Default: PDO
			Current Valid Type:
				PDO: PHP Data Object
				MySQLI: MySQLI Class (as Soon ...)

		[String Charset] (Cannot be Empty or Null)
			Database Default Charset for When Connection Initializer
			Default: utf8
			Example: iso-8859-1

		[String Collation] (Cannot be Empty or Null)
			Database Default Collation Type of Columns for When Connection Initializer
			Default: utf8_general_ci
			Example: latin1_general_ci

		[Boolean Debug_Errors] (Cannot be Empty or Null)
			Database Debug Errors is for Show or Hide Connect and Queries Errors. Suggested "true" for Develop Prescription
			Default: true
			Valid Values:
				- if Choose a Status except of Following Statuses, Debug Errors not Shown
				true: Activating Errors Shown
				false: Deactivating Errors

		[String Tables_Prefix] (Can be Empty or Null)
			Tables Prefix for Database Drivers
			Default: luanchpad_
			Example: tables_

		[String Tables_Suffix] (Can be Empty or Null)
			Tables Prefix for Database Drivers
			Default: _luanchpad
			Example: _tables

		[String Columns_Prefix] (Can be Empty or Null)
			Column Prefixes for Database Drivers
			Default: LaunchPad
			Example: LaunchPad
	*/
	return(array(
		'Active' => false,
		'Server' => 'localhost',
		'Username' => 'root',
		'Password' => '',
		'Database' => 'luanchpad',
		'Port' => 3306,
		'Connection_Type' => 'PDO',
		'Charset' => 'utf8',
		'Collation' => 'utf8_general_ci',
		'Debug_Errors' => true,
		'Tables_Prefixes' => 'asd_',
		'Tables_Suffixes' => '_asd',
		'Columns_Prefixes' => '',
		'Columns_Suffixes' => ''
	));
}
?>