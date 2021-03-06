<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Define routes. */

//Welcome A MODIFFIER
Router::any('index', 'Controllers\Welcome@index');
Router::any('subpage', 'Controllers\Welcome@subPage');

Router::any('', 'Controllers\Dashboard@index');
Router::any('fr/dashboard', 'Controllers\Dashboard@index');

//Contest
Router::any('contest/index', 'Controllers\Contest@index');
//Login routes
Router::any('apps', 'Controllers\Login@index');
Router::get('apps/jsredirect', 'Controllers\Login@jsRedirect');

//BackOffice
Router::any('backoffice/contest/create', 'Controllers\backoffice\Contest@create');

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
