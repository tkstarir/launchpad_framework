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
	use \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins as Ins;
	use \TkStar\LaunchPad\Web as Framework;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\In')){
		// IN Methods for Query (IN, NOT IN)
		trait Ins {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\In
			use Ins\In;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\NotIn
			use Ins\NotIn;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\OrIn
			use Ins\OrIn;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Ins\OrNotIn
			use Ins\OrNotIn;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\In::class);
}
?>