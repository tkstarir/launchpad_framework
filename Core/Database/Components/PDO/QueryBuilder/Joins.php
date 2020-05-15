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
	use \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins as Joins;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins')){
		// Joins Methods Based on PDO
		trait Joins {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\CrossJoin
			use Joins\CrossJoin;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\Join
			use Joins\Join;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\LeftJoin
			use Joins\LeftJoin;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins\RightJoin
			use Joins\RightJoin;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Joins::class);
}
?>