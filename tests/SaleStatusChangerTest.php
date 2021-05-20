<?php


namespace SchGroup\Tests;


use SchGroup\PostAffiliatePro\Components\SaleData;
use SchGroup\PostAffiliatePro\Connectors\PostAffiliateSaleFinder;
use SchGroup\PostAffiliatePro\Connectors\PostAffiliateSaleChanger;

class SaleStatusChangerTest extends InitTest
{
    /** @var PostAffiliateSaleChanger */
    protected $statusChanger;

    /** @var PostAffiliateSaleFinder */
    protected $saleFinder;

    /**
     * SaleStatusChangerTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     * @throws \Matomo\Ini\IniReadingException
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->statusChanger = new PostAffiliateSaleChanger($this->postAffiliateConfig);
        $this->saleFinder = new PostAffiliateSaleFinder($this->postAffiliateConfig);
    }

    /** @test  */
    public function it_can_change_status_of_sale()
    {
        $orderNumber = $this->configForTest['test_order_number'];
        $sale = $this->saleFinder->findFirstSaleBy($orderNumber);
        $newTotalCost = rand(0,100);
        $this->statusChanger->changeSaleStatus($sale->getTransactionId(), SaleData::APPROVED_STATUS, $newTotalCost);
        $sale = $this->saleFinder->findFirstSaleBy($orderNumber);
        $this->assertEquals($newTotalCost, $sale->getTotalCost());
    }

    /** @test */
    public function it_throw_exception()
    {
        $this->expectException(\Exception::class);
        $this->statusChanger->changeSaleStatus("bla-bla", SaleData::APPROVED_STATUS);
    }
}