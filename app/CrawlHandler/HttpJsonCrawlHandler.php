<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 3:30 AM
 */

namespace App\CrawlHandler;


use Illuminate\Support\Facades\Http;

class HttpJsonCrawlHandler implements CrawlHandlerInterface
{

    public function __construct()
    {
    }

    public function crawl(string $url,array $extraInfo = []) :array
    {
        $data = Http::get($url);

        return $data->json();
    }
}
