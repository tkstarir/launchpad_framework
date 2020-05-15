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

namespace TkStar\LaunchPad\Web\Components\Database\PDO {
	use \TkStar\LaunchPad\Web\Components\Database\PDO\Functions as Functions;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\Functions')){
		// SQL Functions Such as Min, Max and ... Based on PDO
		trait Functions {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Average
			use Functions\Aggregates\Average;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Count
			use Functions\Aggregates\Count;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Maximum
			use Functions\Aggregates\Maximum;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Minimum
			use Functions\Aggregates\Minimum;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Num
			use Functions\Aggregates\Num;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Aggregates\Sum
			use Functions\Aggregates\Sum;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Concat
			use Functions\Converters\Concat;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\Functions\Converters\Column
			use Functions\Converters\Column;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\Functions::class);
}
?>