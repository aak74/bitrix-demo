<?php
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors", 1);
// include_once($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');
// echo $_SERVER["DOCUMENT_ROOT"];
// echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/local/classes/App/autoload.php');
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('App', $_SERVER["DOCUMENT_ROOT"] . "/local/classes/App/");
