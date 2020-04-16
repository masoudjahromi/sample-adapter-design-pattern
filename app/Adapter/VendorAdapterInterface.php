<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:13 AM
 */

namespace App\Adapter;


interface VendorAdapterInterface
{
    public function getProductsPrice();
    public function getProductPrice($productId);
}
