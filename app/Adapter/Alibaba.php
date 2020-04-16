<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 2:14 AM
 */

namespace App\Adapter;

use App\CrawlHandler\SoapCrawlHandler;

/**
 * Class Alibaba
 *
 * @package App\Adapter
 */
class Alibaba
{
    /**
     * MOCK API
     */
    const GET_ALL_PRODUCT_URL_EBAY = 'http://Alibaba.fake/Alibaba.asmx?wsdl';
    const GET_ONE_PRODUCT_URL_EBAY = 'http://Alibaba.fake/Alibaba.asmx?wsdl';

    /**
     * @var SoapCrawlHandler
     */
    private $soapCrawlHandler;

    /**
     * Ebay constructor.
     *
     * @param SoapCrawlHandler $soapCrawlHandler
     */
    public function __construct(SoapCrawlHandler $soapCrawlHandler)
    {
        $this->soapCrawlHandler = $soapCrawlHandler;
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
        // NOTE: ASSUME WE PASSED THE CORRECT PRODUCT_ID TO ALIBABA API!
        return $this->soapCrawlHandler->crawl(self::GET_ONE_PRODUCT_URL_EBAY);
    }

    /**
     * Get all products price from Alibaba
     *
     * @return array
     */
    public function getAllProduct()
    {
        return $this->soapCrawlHandler->crawl(self::GET_ALL_PRODUCT_URL_EBAY);
    }
}
