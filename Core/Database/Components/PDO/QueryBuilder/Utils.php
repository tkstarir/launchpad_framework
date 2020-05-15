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

namespace TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder {
	use \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils as Utils;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils')){
		trait Utils {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\First
			use Utils\First;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Last
			use Utils\Last;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Middle
			use Utils\Middle;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Search
			use Utils\Search;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils\Value
			use Utils\Value;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Utils::class);
}
?>