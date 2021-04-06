<?php


namespace SchGroup\PostAffiliatePro\Exceptions;


use Throwable;

class SaleTransactionNotFoundException extends \Exception
{
    /**
     * WrongPostAffiliateCredentialsException constructor.
     * @param string $transactionId
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $transactionId = "", $message = "", $code = 0, Throwable $previous = null)
    {
        $message = $message ?: "Transaction not found for " . $transactionId;
        parent::__construct($message, $code, $previous);
    }
}