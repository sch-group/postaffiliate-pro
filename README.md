POSTAFFILIATE-PRO partner program integration

@ainurecm telegram

```bash
composer require sch-group/postaffiliate-pro
```

Create sale:
```
$postAffiliateConfig = new PostAffiliateConfig($config['host'], $config['login'], $config['password']);
$saleGenerator = new PostAffiliateSaleGenerator($postAffiliateConfig);
$testSale = new SaleData(
            'accountId',
            1,
            "1234",
            "127.0.0.1",// ip of sale
            SaleData::PENDING_STATUS,
            "ce0efd75" // banner id
        );

 $saleGenerator->createSaleBy($testSale); 
```
Find sale:
```
$saleFinder = new PostAffiliateSaleFinder($postAffiliateConfig);
$orderNumber = 'test_order_number';
$sales  = $saleFinder->findSalesBy($orderNumber);
$sale = $saleFinder->findFirstSaleBy($orderNumber);
```
Update sale's status:
```
$statusChanger = new PostAffiliateSaleStatusChanger($postAffiliateConfig);
$orderNumber = 'test_order_number';
$sale = $saleFinder->findFirstSaleBy($orderNumber);
$statusChanger->changeSaleStatus($sale->getTransactionId(), SaleData::APPROVED_STATUS);
```