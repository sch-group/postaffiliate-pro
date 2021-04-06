<?php


namespace SchGroup\Tests;


use SchGroup\PostAffiliatePro\Components\SaleData;
use SchGroup\PostAffiliatePro\Connectors\PostAffiliateSaleGenerator;

class SaleGeneratorTest extends InitTest
{
    /** @var PostAffiliateSaleGenerator */
    protected $saleGenerator;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->saleGenerator = new PostAffiliateSaleGenerator($this->postAffiliateConfig);
    }

    /** @test  */
    public function can_create_sale(): void
    {
        $testSale = new SaleData(
            $this->saleGenerator->getPostAffiliateConfig()->getAccountId(),
            1,
            "1234",
            $this->configForTest['test_ip'],
            SaleData::PENDING_STATUS,
            "ce0efd75"
        );

        $this->saleGenerator->createSaleBy($testSale);
    }
}