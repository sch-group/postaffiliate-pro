<?php

namespace SchGroup\PostAffiliatePro\Interfaces;

use SchGroup\PostAffiliatePro\Components\SaleData;

interface SaleGenerator
{
    public function createSaleBy(SaleData $saleData): void;

}