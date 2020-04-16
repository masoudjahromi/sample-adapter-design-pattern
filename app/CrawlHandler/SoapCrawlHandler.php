<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 3:30 AM
 */

namespace App\CrawlHandler;

class SoapCrawlHandler implements CrawlHandlerInterface
{
    /**
     * @param string $url
     * @param array $extraInfo
     *
     * @return array
     */
    public function crawl(string $url, array $extraInfo = []): array
    {
//        $client = new SoapClient($url);
//        $contact = new Product(100, "John");
//        $response = $client->__soapCall("Function1");
    }
}
