<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:14 AM
 */

namespace App\Adapter;

use App\Constants\Constant;
use App\Repository\ProductRepository;

class AmazonAdapter implements VendorAdapterInterface
{
    /**
     * @var Amazon
     */
    private $amazon;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * AmazonAdapter constructor.
     *
     * @param Amazon            $amazon
     * @param ProductRepository $productRepository
     */
    public function __construct(Amazon $amazon, ProductRepository $productRepository)
    {
        $this->amazon = $amazon;
        $this->productRepository = $productRepository;
    }

    public function getProductsPrice()
    {
        $allProductPrice = $this->amazon->getAllProductPrice();
        foreach ($allProductPrice as $product) {
            $this->productRepository->addProductPrice($product->product_id, Constant::AMAZON_ID, $product->price);
        }
    }

    public function getProductPrice($productId)
    {
        $productPrice = $this->amazon->getProductPriceById($productId);
        $this->productRepository->addProductPrice($productPrice['product_id'], Constant::AMAZON_ID, $productPrice['price']);
    }

}
