<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors", 1);

$name = htmlspecialchars($_GET["name"]);
if (in_array($name, ["basic", "filter", "two", "filter-name"])) {
    require($_SERVER["DOCUMENT_ROOT"] . "/usage/examples/" . $name . ".php");

    $hl = new \Highlight\Highlighter();
    $code = $hl->highlight("php", print_r($result, true))->value;

    $output["html"] = "";
    if (is_array($result)) {
        $output["html"] .= 'Элементов = ' . count($result);
    }
    $output["html"] .= '<pre class="result-scrollable hljs php">';
    $output["html"] .= $code ;
    $output["html"] .= '</pre>';

    if ($output["html"]) {
        $output["status"] = "ok";
    }
} else {
    $output["status"] = "error";
}

echo json_encode($output, JSON_HEX_AMP);
