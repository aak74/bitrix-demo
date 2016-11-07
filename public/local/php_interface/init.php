<?
require_once($_SERVER["DOCUMENT_ROOT"] . '/local/classes/Gb/autoload.php');
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('Gb', $_SERVER["DOCUMENT_ROOT"] . "/local/classes/Gb/");

function updateFiles($limit = 50)
{
    $obj = new \Gb\File;
    $res = $obj->updateFiles($limit);
    return "updateFiles('" . $limit . "');";
}

function updateModels($limit = 50)
{
    $obj = new \Gb\Parser\Datacar;
    $res = $obj->updateModels(50);
    return "updateModels('" . $limit . "');";
}
//пункт в админке в разделе "сервисы"
/*
AddEventHandler('main', 'OnBuildGlobalMenu', 'CustomMenuElements');
function CustomMenuElements(&$aGlobalMenu, &$aModuleMenu) {
    $aModuleMenu[] = array(
        "parent_menu" => "global_menu_services",
        "sort" => 1000,
        "text" => "Настройка автокаталога",
        "title" => "Настройка автокаталога",
        "url" => "gbauto_catalog.php",
        "more_url" => array(),
        "icon" => "",
        "page_icon" => "",
    );
    $aModuleMenu[] = array(
        "parent_menu" => "global_menu_services",
        "sort" => 1000,
        "text" => "Добавление нового авто",
        "title" => "Добавление нового авто",
        "url" => "gbauto_auto_add.php",
        "more_url" => array(),
        "icon" => "",
        "page_icon" => "",
    );
}
*/