<?php


namespace SchGroup\PostAffiliatePro\Connectors;


use Gpf_Rpc_Array;
use Gpf_Data_Filter;
use Pap_Api_Session;
use Pap_Api_TransactionsGrid;
use SchGroup\PostAffiliatePro\Interfaces\SaleFinder;
use SchGroup\PostAffiliatePro\Components\GetSaleResponse;
use SchGroup\PostAffiliatePro\Exceptions\WrongPostAffiliateCredentialsException;

class PostAffiliateSaleFinder extends PostAffiliateConnector implements SaleFinder
{
    /**
     * @var Pap_Api_Session
     */
    protected $session;

    /**
     * @param string $orderNumber
     * @return GetSaleResponse
     */
    public function findFirstSaleBy(string $orderNumber): ?GetSaleResponse
    {
        try {
            $sales = $this->findSalesBy($orderNumber);
        } catch (\Exception $exception) {
            return null;
        }
        if(empty($sales)) {
            return null;
        }
        $sale = array_shift($sales);

        return new GetSaleResponse(
            $sale[GetSaleResponse::USER_ID_COLUMN],
            $sale[GetSaleResponse::TRANSACTION_ID_COLUMN],
            $sale[GetSaleResponse::CAMPAIGN_ID_COLUMN],
            $sale[GetSaleResponse::COMMISSION_COLUMN],
            $sale[GetSaleResponse::USER_ID_COLUMN],
            $sale[GetSaleResponse::TOTAL_COST]
        );
    }

    /**
     * @param string $orderNumber
     * @return array
     * @throws WrongPostAffiliateCredentialsException|\Gpf_Exception
     */
    public function findSalesBy(string $orderNumber): array
    {
        $this->attemptLogin();

        $request = new Pap_Api_TransactionsGrid($this->session);

        $request->addParam('columns', new Gpf_Rpc_Array(
            GetSaleResponse::buildColumns()
        ));

        $request->addFilter('orderid', Gpf_Data_Filter::EQUALS, $orderNumber);
        $request->setLimit(0, 100);
        $request->setSorting('orderid', false);
        $request->sendNow();
        $grid = $request->getGrid();
        $recordset = $grid->getRecordset();

        return $recordset->toArray();
    }

}