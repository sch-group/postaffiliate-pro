<?php


namespace SchGroup\PostAffiliatePro\Connectors;


use Pap_Api_Transaction;
use SchGroup\PostAffiliatePro\Components\SaleData;
use SchGroup\PostAffiliatePro\Interfaces\SaleStatusChanger;
use SchGroup\PostAffiliatePro\Exceptions\SaleTransactionNotFoundException;
use SchGroup\PostAffiliatePro\Exceptions\WrongPostAffiliateCredentialsException;

class PostAffiliateSaleChanger extends PostAffiliateConnector implements SaleStatusChanger
{

    /**
     * @param string $transactionId
     * @param string $toStatus
     * @param float|null $totalCost
     * @throws SaleTransactionNotFoundException
     * @throws WrongPostAffiliateCredentialsException
     * @throws \Exception
     */
    public function changeSaleStatus(string $transactionId, string $toStatus, float $totalCost = null): void
    {
        $this->attemptLogin();
        $sale = new Pap_Api_Transaction($this->session);
        $sale->setTransId($transactionId);

        if (!($sale->load())) {
            throw new SaleTransactionNotFoundException($transactionId);
        }

        if ($this->isPossibleUpdateStatus($toStatus, $sale)) {
            $sale->setStatus($toStatus);
        }
        
        if(isset($totalPrice)) {
            $sale->setTotalCost($totalCost);
        }

        $sale->save();
    }

    /**
     * @param string $toStatus
     * @param Pap_Api_Transaction $sale
     * @return bool
     */
    private function isPossibleUpdateStatus(string $toStatus, Pap_Api_Transaction $sale): bool
    {
        return $toStatus != $sale->getStatus() &&
            in_array($toStatus, SaleData::AVAILABLE_STATUSES);
    }
}