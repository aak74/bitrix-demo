<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors", 1);

$name = htmlspecialchars($_GET["name"]);
if (in_array($name, ["basic", "filter", "two", "filter-name"])) {
    require($_SERVER["DOCUMENT_ROOT"] . "/usage/examples/" . $name . ".php");

    $hl = new \Highlight\Highlighter();
    $hl->setTabReplace("    ");
    $code = $hl->highlight("sql", \Akop\Util::getLastQuery())->value;

    $output["html"] = '<pre class="result-scrollable hljs sql">';
    $output["html"] .= $code ;
    $output["html"] .= '</pre>';

    if ($output["html"]) {
        $output["status"] = "ok";
    }
} else {
    $output["status"] = "error";
}

echo json_encode($output, JSON_HEX_AMP);
