<?php


namespace SchGroup\PostAffiliatePro\Connectors;


use Pap_Api_Transaction;
use SchGroup\PostAffiliatePro\Components\SaleData;
use SchGroup\PostAffiliatePro\Interfaces\SaleStatusChanger;
use SchGroup\PostAffiliatePro\Exceptions\SaleTransactionNotFoundException;
use SchGroup\PostAffiliatePro\Exceptions\WrongPostAffiliateCredentialsException;

class PostAffiliateSaleStatusChanger extends PostAffiliateConnector implements SaleStatusChanger
{

    /**
     * @param string $transactionId
     * @param string $toStatus
     * @param string $merchantNote
     * @throws SaleTransactionNotFoundException
     * @throws WrongPostAffiliateCredentialsException
     * @throws \Exception
     */
    public function changeSaleStatus(string $transactionId, string $toStatus, string $merchantNote = ''): void
    {
        $this->attemptLogin();
        $sale = new Pap_Api_Transaction($this->session);
        $sale->setTransId($transactionId);

        if (!($sale->load())) {
            throw new SaleTransactionNotFoundException($transactionId);
        }

        if ($this->isPossibleUpdate($toStatus, $sale)) {
            $sale->setStatus($toStatus);
            $sale->setMerchantNote($merchantNote);
            $sale->save();
        }
    }

    /**
     * @param string $toStatus
     * @param Pap_Api_Transaction $sale
     * @return bool
     */
    private function isPossibleUpdate(string $toStatus, Pap_Api_Transaction $sale): bool
    {
        return $toStatus != $sale->getStatus() &&
            in_array($toStatus, SaleData::AVAILABLE_STATUSES);
    }
}