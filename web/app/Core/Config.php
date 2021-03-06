<?php
/**
 * Config - an example for setting up system settings.
 * When you are done editing, rename this file to 'Config.php'.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Core;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        //Change URL params
        if (defined('ENVIRONMENT')) {
            switch (ENVIRONMENT) {
                case 'development':
                    define('ENV', 'dev');
                    define('PROTOCOL', 'http');
                    break;
                case 'production':
                    define('ENV', '');
                    define('PROTOCOL', 'https');
                    break;
                default:
                    exit('The application environment is not set correctly.');
            }
        }
        /**
         * Turn on output buffering.
         */
        ob_start();

        /**
         * Define relative base path.
         */
        define('DIR', PROTOCOL .'://the-pic-contest'. ENV .'.herokuapp.com/');

        /**
         * Define relative public path.
         */
        define('PUBLIC_DIR', PROTOCOL .'://the-pic-contest'. ENV .'.herokuapp.com/public/');

        /**
         * Set default controller and method for legacy calls.
         */
        define('DEFAULT_CONTROLLER', 'welcome');
        define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        define('TEMPLATE', 'picontest');

        /**
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'fr');

        //database details ONLY NEEDED IF USING A DATABASE

        /**
         * Database engine default is mysql.
         */
        define('DB_TYPE', 'pgsql');

        /**
         * Database host default is localhost.
         */
        define('DB_HOST', 'ec2-54-204-8-224.compute-1.amazonaws.com');

        /**
         * Database host default is localhost.
         */
        define('DB_PORT', '5432');
        /**
         * Database name.
         */
        define('DB_NAME', 'd9sajt9tcst8jb');

        /**
         * Database username.
         */
        define('DB_USER', 'zonmcwaicehuik');

        /**
         * Database password.
         */
        define('DB_PASS', 'LkDPfGNZjOLBC6LeheOshQ0_Y0');

        /**
         * Database password.
         */
        define('DB_CONFIG', "host=" . DB_HOST . " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS);

        /**
         * PREFER to be used in database calls default is smvc_
         */
        define('PREFIX', 'pc_');

        /**
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'picontest_');

        /**
         * Optional create a constant for the name of the site.
         */
        define('SITETITLE', 'Picontest');

        /**
         * Optionall set a site email address.
         */
        //define('SITEEMAIL', '');

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /**
         * Set timezone.
         */
        date_default_timezone_set('Europe/Paris');

        /**
         * Start sessions.
         */
        Session::init();
    }
}
