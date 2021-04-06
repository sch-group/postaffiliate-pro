API PICKPOINT PHP SDK

https://pickpoint.ru/sales/api/

@ainurecm telegram

```bash
composer require sch-group/pickpoint
```
Примеры: 

Инициализация
```
$config = [
 'host' => '',
 'login' => '',
 'password' => '',
 'ikn' => '',
];    

$pickPointConf = new PickPointConf($config['host'], $config['login'], $config['password'], $config['ikn']);

$defaultPackageSize = new PackageSize(20, 20,20); // может быть null

$senderDestination = new SenderDestination('Москва', 'Московская обл.'); // Адрес отправителя

$client = new PickPointConnector($pickPointConf, $senderDestination, $defaultPackageSize);
 
 
Так же можно добавить кэширование, для ускорения запроса на авторизацию 
$redisCacheConf = [
 'host' => '127.0.0.1',
 'port' => 6379
];

$client = new PickPointConnector($pickPointConf, $senderDestination, $defaultPackageSize, $redisCacheConf);

 
```

Получение массива постаматов

```
