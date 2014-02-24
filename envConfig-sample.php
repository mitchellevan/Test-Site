<?php

// Add your database connection details
$PDOConnection['dbName'] = '';
$PDOConnection['user'] = '';
$PDOConnection['pass'] = '';
$PDOConnection['opts'] = array(PDO::ATTR_PERSISTENT => true);
$PDOConnection['dbType'] = 'mysql';
define('DB_CONFIG', serialize($PDOConnection));


// class directories
$class_directories = array(
    $_SERVER['DOCUMENT_ROOT'] . '/lib/php/',
    $_SERVER['DOCUMENT_ROOT'] . '/lib/php/vendor/',
    $_SERVER['DOCUMENT_ROOT'] . '/lib/php/vendor/gs_libs/');

// get the path to the includes directory
define('INC_PATH', $_SERVER['DOCUMENT_ROOT'] . '/lib/php/');

// get the path to the templates directory
$tPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/';
define('TEMPLATE_PATH', $tPath);

// get the default template tags
$templateDefaults = array('lang' => 'en', 'dir' => 'ltr', 'headerSheets' => '', 'headerScripts' => '', 'footerScripts' => '', 'analyticsID' => 'UA-XXXXX-X', 'meta_description' => '');
define('TEMPLATE_DEFAULTS', serialize($templateDefaults));
