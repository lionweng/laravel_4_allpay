#Allpay SDK wrapper for Laravel 4

#setup

composer.json:

```
"require": {
  "lionweng/laravel_4_allpay": "0.1.0"
}
```

composer：

```
$ composer update
```

#Package

將 service provider 登記在 ```app/config/app.php```內的 ```providers``` 陣列 :

```php
'providers' => array(
	// ...

    'Howtomakeaturn\Allpay\AllpayServiceProvider',

)
```

將類別縮寫登記在 ```app/config/app.php```內的```aliases``` 陣列 :


```php
'aliases' => array(
	// ...
    'Allpay' => 'Howtomakeaturn\Allpay\Facade\Allpay',
)
```

# 設定


在config資料夾新增 ``app/config/laravel_4_allpay.php`` ，然後加入以下code：

```php
<?php
return array(

    'ServiceURL' => "https://payment.allpay.com.tw/Cashier/AioCheckOut",
    'HashKey' => "hashkey",
    'HashIV' => "hashiv",
    'MerchantID' => "merchantid"

);
```

# 用法

## Samples

###官方文件範例

```php
Allpay::instance()->Send['ReturnURL'] = "<<收到付款完成通知的伺服器端網址>>";
Allpay::instance()->Send['ClientBackURL'] = "<<歐付寶返回按鈕導向的瀏覽器端網址>>";
Allpay::instance()->Send['OrderResultURL'] = "<<收到付款完成通知的瀏覽器端網址>>";
Allpay::instance()->Send['ChoosePayment'] = PaymentMethod::ALL;
// blah blah
array_push(Allpay::instance()->Send['Items'], array('Name' => "<<產品C>>", 'Price' => (int)"<<單價>>",
'Currency' => "<<幣別>>", 'Quantity' => (int) "<<數量>>", 'URL' => "<<產品說明位址>>"));

/* 產生訂單 */
Allpay::instance()->CheckOut();

```

## 進階用法

``Allpay::instance()``字很多，可以使用縮寫``Allpay::i()``
