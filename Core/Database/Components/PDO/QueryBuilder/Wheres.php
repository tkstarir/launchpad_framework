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
	use \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres as Wheres;
	if(!trait_exists('\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres')){
		trait Wheres {
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\BetweenWhere
			use Wheres\BetweenWhere;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrBetweenWhere
			use Wheres\OrBetweenWhere;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhere
			use Wheres\OrWhere;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereEmpty
			use Wheres\OrWhereEmpty;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereLike
			use Wheres\OrWhereLike;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNotEmpty
			use Wheres\OrWhereNotEmpty;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNotLike
			use Wheres\OrWhereNotLike;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNotNull
			use Wheres\OrWhereNotNull;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\OrWhereNull
			use Wheres\OrWhereNull;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\Where
			use Wheres\Where;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereEmpty
			use Wheres\WhereEmpty;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereLike
			use Wheres\WhereLike;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereNotEmpty
			use Wheres\WhereNotEmpty;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereNotLike
			use Wheres\WhereNotLike;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereNotNull
			use Wheres\WhereNotNull;
			// @trait \TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres\WhereNull
			use Wheres\WhereNull;
		}
	}
	return(\TkStar\LaunchPad\Web\Components\Database\PDO\QueryBuilder\Wheres::class);
}
?>