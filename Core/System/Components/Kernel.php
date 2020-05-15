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

namespace TkStar\LaunchPad\Web\Components\System {
	use \TkStar\LaunchPad\Web\Components\System\Scheduling as Scheduling;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\System\Kernel')){
		// System Class & Methods for Kernel Processes
		trait Kernel {
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\Check_Cli
			use Scheduling\Check_Cli;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\IsCli
			use Scheduling\Check_Linux;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\Check_Windows
			use Scheduling\Check_Windows;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\IsLinux
			use Scheduling\IsCli;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\Check_Linux
			use Scheduling\IsLinux;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\IsWindows
			use Scheduling\IsWindows;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\PHP_OS
			use Scheduling\PHP_OS;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\OS
			use Scheduling\OS;
			// @trait \TkStar\LaunchPad\Web\Components\System\Scheduling\Full_OS
			use Scheduling\Full_OS;
			// @property String $os | default Empty
			protected static $os = '';
			// @property String $full_os | default Empty
			protected static $full_os = '';
			// @property Boolean $cli | default false
			protected static $cli = false;
			// @property Boolean $windows | default false
			protected static $windows = false;
			// @property Boolean $linux | default false
			protected static $linux = false;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\System\Kernel::class);
}
?>