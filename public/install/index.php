<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Установка");

$hl = new \Highlight\Highlighter();
$code = $hl->highlight("php", "composer require aak74/bx-data:dev-master")->value;

?>
<div class="example conatiner-fluid">
	<div class="code col-md-8">
		<p>Установка происходит стандартным для <a href="https://getcomposer.org" target="_blank" nofollow>composer</a> способом:</p>
		<pre class="hljs php"><?=$code?></pre>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>