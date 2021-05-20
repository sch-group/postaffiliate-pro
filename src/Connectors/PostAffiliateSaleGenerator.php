<?php


namespace SchGroup\PostAffiliatePro\Connectors;


use Pap_Api_SaleTracker;
use SchGroup\PostAffiliatePro\Components\SaleData;
use SchGroup\PostAffiliatePro\Interfaces\SaleGenerator;
use SchGroup\PostAffiliatePro\Components\PostAffiliateConfig;

class PostAffiliateSaleGenerator extends PostAffiliateConnector implements SaleGenerator
{
    /**
     * @var Pap_Api_SaleTracker
     */
    private $saleTracker;

    public function __construct(PostAffiliateConfig $config)
    {
        parent::__construct($config);
        $this->saleTracker = new Pap_Api_SaleTracker(
            $this->getPostAffiliateConfig()->getHost() . '/scripts/sale.php', $config->isDebugMode()
        );
    }

    /**
     * @param SaleData $saleData
     */
    public function createSaleBy(SaleData $saleData): void
    {
        $this->saleTracker->setAccountId($saleData->getAccountId());
        if ($saleData->getIp()) {
            $this->saleTracker->setIp($saleData->getIp());
            $this->saleTracker->setVisitorId();
        }
        $affiliateSale = $this->saleTracker->createSale();
        $affiliateSale->setTotalCost($saleData->getTotal());
        $affiliateSale->setOrderId($saleData->getOrderId());
        $affiliateSale->setProductId($saleData->getProductId());
        $affiliateSale->setStatus($saleData->getStatus());
        $affiliateSale->setBannerId($saleData->getBannerId());
        $affiliateSale->setAffiliateId($saleData->getAffiliateId());
        $affiliateSale->setCampaignId($saleData->getCampaignId());
        $affiliateSale->setCurrency($saleData->getCurrency());
        $affiliateSale->setData1($saleData->getData());

        $this->saleTracker->register();
    }
}