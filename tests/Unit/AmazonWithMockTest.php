<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use App\Adapter\Amazon;
use GuzzleHttp\Handler\MockHandler;
use PHPUnit\Framework\TestCase;
use App\CrawlHandler\HttpJsonCrawlHandler;
use App\Exceptions\HttpJsonCrawlHandlerException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class AmazonWithMockTest extends TestCase
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
        $this->baseUri = Amazon::GET_ALL_PRODUCT_URL_AMAZON;
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

        $crawl = $this->crawl(400);

        $crawl->crawl('');
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

        $crawl = $this->crawl(400);

        $crawl->crawl($url);
    }

    /**
     * @throws HttpJsonCrawlHandlerException
     */
    public function testShouldReturnPostcodeData()
    {
        $expected = file_get_contents(__DIR__ . '/Mock/Product/Amazon/price.txt');
        $crawl = $this->crawl(200, $expected);
        $result = $crawl->crawl($this->baseUri);

        $this->assertEquals(json_decode($expected), $result);
    }

    private function crawl($status, $body = null)
    {
        $mock = new MockHandler([new Response($status, [], $body)]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        return new HttpJsonCrawlHandler($client, $this->baseUri);
    }


}
