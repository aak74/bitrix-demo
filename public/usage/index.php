<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Как использовать");

$hl = new \Highlight\Highlighter();
// $hl->setAutodetectLanguages(["php"]);
$code = $hl->setTabReplace("    ");
// $code = $hl->highlightAuto(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/usage/index.php"));
$examples = [
    "basic" => "Один highload блок без параметров",
    "two" => "Два highload блока",
    "filter" => "Два highload блока с фильтром и сортировкой",
    "filter-name" => "Два highload блоков с фильтром по значению в справочнике",
];
foreach ($examples as $name => $description) {
    $result["examples"][$name] = [
        "code" => $hl->highlight("php", file_get_contents("examples/{$name}.php"))->value,
        "description" => $description
    ];
}
$result["class"] = $hl->highlight("php", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/classes/App/Catalog/Model.php"))->value;
?>
<h2>Текст класса, описывающего сущность</h2>
    <div class="example container-fluid">
        <div class="code col-md-8">
            <pre class="hljs php"><?=$result["class"]?></pre>
            <p>В битриксе класс "немного" более многословный. :)</p>
        </div>
    </div>

<h2>Примеры кода с живыми результатами</h2>
<?php foreach ($result["examples"] as $name => $example) :?>
    <div class="example container-fluid">
        <h3><?=$example["description"]?></h3>
        <div class="code col-md-8">
            <pre class="hljs php"><?=$example["code"]?></pre>
        </div>
        <div class="controls col-md-4">
            <div>
                <a class="btn btn-default show-result" data-name="<?=$name?>" href="#" role="button">Показать результат</a>
            </div>
            <div>
                <a class="btn btn-default show-sql" data-name="<?=$name?>" href="#" role="button">Показать SQL</a>
            </div>
        </div>
    </div>
<?php endforeach;?>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
