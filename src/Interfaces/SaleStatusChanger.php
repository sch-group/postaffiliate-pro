<?php


namespace SchGroup\PostAffiliatePro\Interfaces;


interface SaleStatusChanger
{
    public function changeSaleStatus(string $transactionId, string $toStatus, string $merchantNote = ''): void;
}