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
		Controllers Config Variebles for Pure LaunchPad. you Can Change the Values and Add Custom Varieble
		Explanations of Default Variebles
		----------------------------------------------------------------------------------------

		[String Main_Class] (Cannot be Empty or Null)
			Default Controller that When You Want Load for UnSpecified Requests and Urls
			Default: Main
			Example: Dashboard

		[String Main_Method] (Cannot be Empty or Null)
			Default Method that When You Don't Define Main Method for a Controller
			Default: Main
			Example: Dashboard
	*/
	return(array(
		'Main_Class' => 'Main',
		'Main_Method' => 'Start'
	));
}
?>