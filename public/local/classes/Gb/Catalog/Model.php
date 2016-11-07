<?
namespace Gb\Catalog;

class Model extends \Gb\Element\HlElement
{
	protected $entityName = 'Model';
	protected $softDelete = true;

	/**
	 * Добавляет родительскую модель, которая не содержится во внешних источниках.
	 * Например, такой моделью будет Golf. Тогда как во внешних источниках содержится Golf 5 и т.д.
	 * @param array $params [description]
	 */
	public function addParent( array $params )
	{
		$result = false;
		$objBrand = new \Gb\Catalog\Brand;
		$brand = $objBrand->getRowByName($params["brandName"]);
		if ( empty($brand) ) {
			throw new \Exception("Бренд {$params["brandName"]} не найден", 404);
		}
		$result = $this->add(array(
			"name" => $params["name"],
			"brandId" => $brand["id"],
		));
		return $result;
	}


	/**
	 * Обновление модели данными из внешнего источника
	 * @param array $filter
	 */
	public function updateFromExternal( array $filter )
	{
		$result = false;
		$objExtBrand = new \Gb\Catalog\Carapi\Brand;
		$brand = $objExtBrand->getRow(array(
			"filter" => array("name" => $filter["brandName"])
		));

		if ( $brand ) {
			$objExt = new \Gb\Catalog\Carapi\Model;
			$itemExt = $objExt->getRow(array(
				"filter" => array(
					"name" => $filter["name"],
					"brandId" => $filter["brandName"],
					// "brandId" => $brand["id"],
				)
			));
			\Gb\Util::pr_var($itemExt, 'update $itemExt');
			if ( $itemExt && 0) {

				$result = $this->upsert(
					array(
						"name" => $filter["name"],
						"brandId" => $brand["id"],
					),
					array(
						"name" => $itemExt["name"],
						"xmlId" => $itemExt["autoru_id"],
						"brandId" => $brand["id"],
					)
				);

			}
			// \Gb\Util::pr_var($result, 'update $result');

		}
		return $result;
	}
}
