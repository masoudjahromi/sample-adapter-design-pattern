<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/17/2020
 * Time: 5:02 PM
 */

namespace App\Exceptions;

use Exception;

/**
 * Class HttpJsonCrawlHandlerException
 *
 * @package App\Exceptions
 */
class HttpJsonCrawlHandlerException extends Exception
{
    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }
}
