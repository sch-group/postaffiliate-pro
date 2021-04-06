<?php


namespace SchGroup\Tests;


use SchGroup\PostAffiliatePro\Connectors\PostAffiliateSaleFinder;

class SaleFinderTest extends InitTest
{
    /**
     * @var
     */
    protected $saleFinder;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->saleFinder = new PostAffiliateSaleFinder($this->postAffiliateConfig);

    }

    /**
     * @test
     * @throws \Gpf_Exception
     * @throws \SchGroup\PostAffiliatePro\Exceptions\WrongPostAffiliateCredentialsException
     */
    public function it_can_find_sale_by_order_number(): void
    {
        $orderNumber = $this->configForTest['test_order_number'];
        $sales  = $this->saleFinder->findSalesBy($orderNumber);
        $this->assertTrue(is_array($sales));
        $sale = $this->saleFinder->findFirstSaleBy($orderNumber);
        $this->assertNotEmpty($sale->getTransactionId());
    }


}