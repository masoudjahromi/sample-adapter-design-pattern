<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 3:30 AM
 */

namespace App\CrawlHandler;

use App\Exceptions\HttpJsonCrawlHandlerException;
use GuzzleHttp\Client;

class HttpJsonCrawlHandler implements CrawlHandlerInterface
{
    /**
     * @var Client
     */
    private $client;
    private $baseUri;

    public function __construct(Client $client, $baseUri = '')
    {
        $this->client = $client;
        $this->baseUri = $baseUri;
    }

    /**
     * @param string $url
     * @param array $extraInfo
     * @return array
     * @throws HttpJsonCrawlHandlerException
     */
    public function crawl(string $url, array $extraInfo = []): array
    {
        if (!$url) {
            $this->throwException('URL is required.');
        }

        try {
            $result = $this->client->get($this->getBaseUri() . $url, $extraInfo);

            return json_decode($result->getBody()->getContents());
        } catch (\Exception $e) {
            $this->throwException(sprintf('Failed to get url data for "%s".', $url));
        }
    }

    public function throwException($message, $code = 400)
    {
        throw new HttpJsonCrawlHandlerException($message, $code);
    }

    public function setBaseUri($url)
    {
        $this->baseUri = $url;

        return $this;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }
}
