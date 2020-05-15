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
	use \TkStar\LaunchPad\Components as Components;
	!defined('DS') ? define('DS', str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), DIRECTORY_SEPARATOR)) : '';
	!defined('PS') ? define('PS', PATH_SEPARATOR) : '';
	!defined('Directory') ? define('Directory', str_ireplace(array('/', '\/', '\\'), array('/', '/', '/'), dirname(__DIR__)) . DS) : '';
	!defined('App_Folder') ? define('App_Folder', 'App') : '';
	!defined('Vendor_Dir') ? define('Vendor_Dir', 'vendor') : '';
	require_once(Directory . App_Folder . DS . 'Core' . DS . 'LaunchPad.php');
	require_once(Directory . Vendor_Dir . DS . 'autoload.php');
	LaunchPad::BootStrap();
	$system = new System();
	tdd(System::IsCli());
	tdd(System::IsLinux());
	tdd(System::IsWindow());
	tdd(System::Full_OS());
	die;
	Database::Active();
	Database::Table('main', function($s){
		Database::Where('id', '!=', '10');
		print_r($s->Exists());
		die;
	});
	echo('Hello World !');
}
// TkStar\LaunchPad\Components
?>