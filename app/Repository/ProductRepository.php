<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:25 AM
 */

namespace App\Repository;


use App\DataLayer\ProductMysqlDataLayer;

class ProductRepository
{
    /**
     * @var ProductMysqlDataLayer
     */
    private $dataLayer;

    public function __construct(ProductMysqlDataLayer $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    public function addProductPrice($productId, $vendorId, $price)
    {
        $this->dataLayer->set($productId, $vendorId, $price);
    }

    public function getProductPriceById($productId)
    {
        return $this->dataLayer->getBestPrice($productId);
    }

}
