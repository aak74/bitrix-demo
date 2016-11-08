<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="main-sidebar">
	<div class="sidebar">

		<ul class="sidebar-menu">
			<li class="header">
				<?
	    		$APPLICATION->IncludeFile(
					SITE_DIR."include/company_slogan.php",
					Array(),
					Array("MODE"=>"html")
				);
				?>
			</li>
			<li class="active"><a href="#"><span>Link</span></a></li>
			<li><a href="#"><span>Another Link</span></a></li>
			<li class="treeview">
				<a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="#">Link in level 2</a></li>
					<li><a href="#">Link in level 2</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<?endif;?>