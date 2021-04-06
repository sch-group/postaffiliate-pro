<?php

namespace SchGroup\PostAffiliatePro\Exceptions;

use Throwable;

class WrongPostAffiliateCredentialsException extends \Exception
{
    /**
     * WrongPostAffiliateCredentialsException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = $message ?: "Wrong merchant login or password";
        parent::__construct($message, $code, $previous);
    }
}