<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function theBestPrice($productId)
    {
        return $this->productRepository->getProductPriceById($productId);
    }
}
