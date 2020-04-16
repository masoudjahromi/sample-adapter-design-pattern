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

class EbayAdapter implements VendorAdapterInterface
{
    /**
     * @var Ebay
     */
    private $ebay;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * AmazonAdapter constructor.
     *
     * @param Ebay              $ebay
     * @param ProductRepository $productRepository
     */
    public function __construct(Ebay $ebay, ProductRepository $productRepository)
    {
        $this->ebay = $ebay;
        $this->productRepository = $productRepository;
    }

    public function getProductsPrice()
    {
        $allProductPrice = $this->ebay->getAllProduct();
        foreach ($allProductPrice as $product) {
            $this->productRepository->addProductPrice($product['product_id'], Constant::EBAY_ID, $product['price']);
        }
    }

    public function getProductPrice($productId)
    {
        $productPrice = $this->ebay->getProductById($productId);
        $this->productRepository->addProductPrice($productPrice['product_id'], Constant::EBAY_ID, $productPrice['price']);
    }

}
