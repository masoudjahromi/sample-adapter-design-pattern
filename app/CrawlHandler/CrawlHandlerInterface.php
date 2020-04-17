<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/16/2020
 * Time: 3:30 AM
 */

namespace App\CrawlHandler;



interface CrawlHandlerInterface
{
    public function crawl(string $url, array $extraInfo = []): array;

    public function throwException(string $message, int $code = 400);
}
