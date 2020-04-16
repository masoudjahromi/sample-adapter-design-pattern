<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:14 AM
 */

namespace App\Adapter;

use App\CrawlHandler\HttpXmlCrawlHandler;

/**
 * Class Ebay
 *
 * @package App\Adapter
 */
class Ebay
{
    /**
     * MOCK API
     */
    const GET_ALL_PRODUCT_URL_EBAY = 'http://www.mocky.io/v2/5e98178a3500003800c47e44';
    const GET_ONE_PRODUCT_URL_EBAY = 'http://www.mocky.io/v2/5e98273c3500006b00c47f0d';

    /**
     * @var HttpXmlCrawlHandler
     */
    private $httpXmlCrawlHandler;

    /**
     * Ebay constructor.
     *
     * @param HttpXmlCrawlHandler $httpXmlCrawlHandler
     */
    public function __construct(HttpXmlCrawlHandler $httpXmlCrawlHandler)
    {
        $this->httpXmlCrawlHandler = $httpXmlCrawlHandler;
    }

    /**
     * Get product price by ID
     *
     * @param int $productId
     *
     * @return array
     */
    public function getProductById($productId)
    {
        // NOTE: ASSUME WE PASSED THE CORRECT PRODUCT_ID TO EBAY API!
        return $this->httpXmlCrawlHandler->crawl(self::GET_ONE_PRODUCT_URL_EBAY);
    }

    /**
     * Get all products price from Ebay
     *
     * @return array
     */
    public function getAllProduct()
    {
        return $this->httpXmlCrawlHandler->crawl(self::GET_ALL_PRODUCT_URL_EBAY);
    }
}
