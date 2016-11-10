<?
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors", 1);
require_once($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/local/classes/App/autoload.php');
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('App', $_SERVER["DOCUMENT_ROOT"] . "/local/classes/App/");