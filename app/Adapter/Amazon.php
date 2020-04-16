<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:14 AM
 */

namespace App\Adapter;


use App\CrawlHandler\HttpJsonCrawlHandler;

/**
 * Class Amazon
 *
 * @package App\Adapter
 */
class Amazon
{
    /**
     * MOCK API
     */
    const GET_ALL_PRODUCT_URL_AMAZON = 'http://www.mocky.io/v2/5e9826e73500006d00c47f07';
    const GET_ONE_PRODUCT_URL_AMAZON = 'http://www.mocky.io/v2/5e9793d63000005000b6df5a';

    /**
     * @var HttpJsonCrawlHandler
     */
    private $httpJsonCrawlHandler;

    /**
     * Amazon constructor.
     *
     * @param HttpJsonCrawlHandler $httpJsonCrawlHandler
     */
    public function __construct(HttpJsonCrawlHandler $httpJsonCrawlHandler)
    {
        $this->httpJsonCrawlHandler = $httpJsonCrawlHandler;
    }

    /**
     * Get product price by ID
     *
     * @param int $productId
     *
     * @return array
     */
    public function getProductPriceById($productId)
    {
        // NOTE: ASSUME WE PASSED THE CORRECT PRODUCT_ID TO AMAZON API!
        return $this->httpJsonCrawlHandler->crawl(self::GET_ONE_PRODUCT_URL_AMAZON);
    }

    /**
     * Get all products price from Amazon
     *
     * @return array
     */
    public function getAllProductPrice()
    {
        return $this->httpJsonCrawlHandler->crawl(self::GET_ALL_PRODUCT_URL_AMAZON);
    }
}
