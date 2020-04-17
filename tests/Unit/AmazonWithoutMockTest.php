<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use App\Adapter\Amazon;
use PHPUnit\Framework\TestCase;
use App\CrawlHandler\HttpJsonCrawlHandler;
use App\Exceptions\HttpJsonCrawlHandlerException;

class AmazonWithoutMockTest extends TestCase
{
    /**
     * @var Amazon
     */
    private $amazon;
    /**
     * @var HttpJsonCrawlHandler
     */
    private $httpJsonCrawlHandler;
    private $baseUri;

    public function setUp(): void
    {
        parent::setUp();
        $client = new Client();
        $this->baseUri = Amazon::BASE_URL_AMAZON;
        $this->httpJsonCrawlHandler = new HttpJsonCrawlHandler($client, $this->baseUri);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->amazon = null;
    }

    public function testShouldThrowExceptionForEmptyUrlArgument()
    {
        $this->expectException(HttpJsonCrawlHandlerException::class);
        $this->expectExceptionMessage('URL is required.');
        $this->expectExceptionCode(400);

        $this->httpJsonCrawlHandler->crawl('');
    }

    /**
     * @throws HttpJsonCrawlHandlerException
     */
    public function testShouldThrowExceptionForInvalidUrlArgument()
    {
        $url = 'invalid url';

        $this->expectException(HttpJsonCrawlHandlerException::class);
        $this->expectExceptionMessage(sprintf('Failed to get url data for "%s".', $url));
        $this->expectExceptionCode(400);

        $this->httpJsonCrawlHandler->crawl($url);
    }

    /**
     * @throws HttpJsonCrawlHandlerException
     */
    public function testShouldReturnPostcodeData()
    {
        $expected = file_get_contents(__DIR__ . '/Mock/Product/Amazon/price.txt');
        $result = $this->httpJsonCrawlHandler->setBaseUri($this->baseUri)->crawl(Amazon::GET_ALL_PRODUCT_URL_AMAZON);

        $this->assertEquals(json_decode($expected), $result);
    }

}
