<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");

$hl = new \Highlight\Highlighter();
$code1 = '$models = new \App\Catalog\Model;' . PHP_EOL
    . '$result = $models->getList();';

$code2 = file_get_contents("usage/examples/filter.php");
$sql2 = <<<SQL
SELECT
    `model`.`ID` AS `ID`,
    `model`.`UF_NAME` AS `UF_NAME`,
    `model`.`UF_BRAND` AS `UF_BRAND`,
    `model_brandname_`.`UF_NAME` AS `brandName`
FROM `b_hlbd_auto_model` `model`
LEFT JOIN `b_hlbd_auto_brand` `model_brandname_` ON `model`.`UF_BRAND` = `model_brandname_`.`ID`
WHERE `model`.`UF_BRAND` = 120
AND (`model`.`UF_DELETED` IS NULL OR `model`.`UF_DELETED` = 0)
ORDER BY `model`.`UF_NAME` ASC
SQL;
?>
<p>
Пакет <a href="https://github.com/aak74/bx-data" target='_blank'>aak74/bx-data</a> предназначен для облегчения доступа к данным в 1C-Bitrix. Теперь доступ к различным данным можно получить одинаковым способом.
Вне зависимости от того инфоблок это или highload блок.
</p>
<ul>
	<li>Вам не нужно помнить какой ID у инфоблока.</li>
	<li>Вам не нужно писать кучу строк для получения элементарных данных из highload блока.</li>
	<li>Вам не нужно писать кучу малополезного кода для описания сущностей.</li>
</ul>

<h2>Простой пример</h2>
<span>Для получения списка моделей авто досаточно написать:</span>
<pre class="hljs php">
<?=$hl->highlight("php", $code1)->value;?>
</pre>
<p>
	В переменной <code>$result</code> вы получаете массив моделей. Больше никаких циклов, никаких GetNext, Fetch и прочего.
</p>

<h2>Более сложный пример:</h2>
<span>Два highload блока с фильтром и сортировкой</span>
<pre class="hljs php">
<?=$hl->highlight("php", $code2)->value;?>
</pre>

<h3>Сформированный SQL</h3>
<pre class="hljs sql">
<?=$hl->highlight("sql", $sql2)->value;?>
</pre>


<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");