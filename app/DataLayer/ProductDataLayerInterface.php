<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:33 AM
 */

namespace App\DataLayer;


interface ProductDataLayerInterface
{
    public function getBestPrice($productId);
    public function set($productId, $vendorId, $price);
}
