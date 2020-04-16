<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:33 AM
 */

namespace App\DataLayer;

use App\Price;

class ProductMysqlDataLayer implements ProductDataLayerInterface
{
    public function getBestPrice($productId)
    {
        return Price::where('product_id', $productId)->with(['product', 'vendor'])->orderBy('price', 'asc')->first();
    }

    public function set($productId, $vendorId, $price)
    {
        $newPrice = new Price();
        $newPrice->product_id = $productId;
        $newPrice->vendor_id = $vendorId;
        $newPrice->price = $price;
        $newPrice->save();
    }
}
