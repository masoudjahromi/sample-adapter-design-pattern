<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 3:30 AM
 */

namespace App\CrawlHandler;


use App\Exceptions\HttpXmlCrawlHandlerException;
use Illuminate\Support\Facades\Http;

class HttpXmlCrawlHandler implements CrawlHandlerInterface
{
    /**
     * @param string $url
     * @param array $extraInfo
     *
     * @return array
     */
    public function crawl(string $url, array $extraInfo = []): array
    {
        $data = Http::get($url);
        $xml = simplexml_load_string($data->body());
        $body = json_decode(json_encode($xml), true);

        return $body['element'];
    }

    public function throwException($message, $code = 400)
    {
        throw new HttpXmlCrawlHandlerException($message, $code);
    }

}
