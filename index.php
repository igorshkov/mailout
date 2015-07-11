<?php


/**
 ** UTF 8 encoding
 **/

mb_internal_encoding("UTF-8");
mb_http_output( "UTF-8" );
ob_start("mb_output_handler");


/**
 ** Vendor autoload
 **/

require_once ('vendor/autoload.php');


/**
 ** App autoload
 **/

function autoload($class)
{
    require('app/'.$class.'.php');
}
spl_autoload_register('autoload');


/**
 ** Add Config file
 **/

$config = require(__DIR__ . '/config.php');

/**
 ** Create App
 **/

$app = new App($config);
$app->run();






