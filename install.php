<?php
/**
 * Trying to find some sort of way to allow this repo to be as flexible as possible while also being as fast as possible.
 * Building a Yeoman generator seems a bit heavy handed at the moment
 */

$cmd = "echo php_value auto_prepend_file " . $_SERVER['DOCUMENT_ROOT'] . "/config.php >> .htaccess";

exec($cmd);

echo 'DONE';