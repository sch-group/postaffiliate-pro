<?php


namespace SchGroup\PostAffiliatePro\Interfaces;


use SchGroup\PostAffiliatePro\Components\GetSaleResponse;

interface SaleFinder
{
    public function findFirstSaleBy(string $orderNumber): ?GetSaleResponse;

    public function findSalesBy(string $orderNumber): array;
}