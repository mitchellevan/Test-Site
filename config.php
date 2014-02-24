<?php
/**
 * This file is considered to be more "universal" configuration stuff, whereas the
 * envConfig.php file is, well, environmental. Multiple collaborators can have their own
 * envConfig.php file (or multiple ones, even) whereas global system config would be here.
 */
require('envConfig.php');

// For God's sake turn off display_errors on a production system, please!
error_reporting(E_ALL ^ E_NOTICE);

ini_set('arg_separator.output', '&amp;');
ini_set('session.cookie_httponly', true);
ini_set('session.use_strict_mode', true);

// force some output buffering, for performance reasons
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    ob_start("ob_gzhandler");
} else {
    ob_start();
}

// ensure we're using UTF-8 on everything
header('Content-Type: text/html; charset=utf-8');

// secure header stuff
header('X-Content-Type-Options: nosniff');
header('x-frame-options: deny');
header('x-xss-protection: 1; mode=block');

/**
 * autoloader (lazy loading) function
 *
 * @param  string $class_name
 *
 * @global array  $class_directories
 * @return void
 */
function autoloader($class_name)
{
    // this array comes from envconfig.
    GLOBAL $class_directories;

    //for each directory
    foreach ($class_directories as $directory) {
        //see if the file exists
        if (file_exists($directory . $class_name . '.class.php')) {
            require_once($directory . $class_name . '.class.php');
            //only require the class once, so quit after to save effort
            // (if you got more than one, then name them something else)
            return;
        }
    }
}

spl_autoload_register('autoloader');

// SYSTEM TIMEZONE
date_default_timezone_set('UTC');

if (isset($_GET) || isset($_POST)) {

    // we do our own sanity check because depending on server configs this can cause a clusterfuck
    // due to our own custom escapement of quotes. Seriously, don't remove this
    if (get_magic_quotes_gpc() && !function_exists('FixMagicQuotesGpc')) {
        /**
         * @param $data
         *
         * @return string
         */
        function FixMagicQuotesGpc($data)
        {
            if (is_array($data)) {
                foreach ($data as &$value) {
                    $value = FixMagicQuotesGpc($value);
                }

                return $data;
            } else {
                return stripslashes($data);
            }
        }

        $_GET = FixMagicQuotesGpc($_GET);
        $_POST = FixMagicQuotesGpc($_POST);
        $_REQUEST = FixMagicQuotesGpc($_REQUEST);
    }

    // Require input filtering
    $iFilter = new InputFilter(array());

    // filter all $_GET variables
    foreach ($_GET as $key => $val) {
        if (!is_array($key)) {
            $_GET[$key] = $iFilter->process(strip_tags($val));
        } else {
            $_GET[$key] = $iFilter->process($val);
        }
    }

    // filter all $_POST variables
    foreach ($_POST as $key => $val) {
        if (!is_array($_POST[$key])) {
            $_POST[$key] = $iFilter->process(strip_tags($val));
        } else {
            $_POST[$key] = $iFilter->process($val);
        }
    }
}