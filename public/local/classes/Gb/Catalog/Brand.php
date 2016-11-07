<?
namespace Gb\Catalog;

class Brand extends \Gb\Element\HlElement
{
	protected $entityName = 'Brand';
	protected $softDelete = true;

	/**
	 * Обновление бренда данными из внешнего источника
	 * @param array $filter
	 */
	public function updateFromExternal( array $filter)
	{
		$objExt = new \Gb\Catalog\Carapi\Brand;
		$itemExt = $objExt->getRow(array(
			"filter" => $filter
		));
		// \Gb\Util::pr_var($itemExt, 'update $itemExt');
		if ( $itemExt ) {
			$result = $this->upsert(
				$filter,
				array(
					"name" => $itemExt["name"],
					"xmlId" => $itemExt["autoru_id"],
				)
			);

		}
		// \Gb\Util::pr_var($result, 'update $result');

		return $result;
	}
}