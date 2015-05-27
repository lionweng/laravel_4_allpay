#Allpay SDK wrapper for Laravel 4

#Setup

composer.json:
--------
"require": {
  "lionweng/laravel_4_allpay": "dev-master"
}
--------

composer：
--------
$ composer update
--------

#Package

app/config/app.php -> providers:

--------
'providers' => array(
	// ...

    'Lionweng\Allpay\AllpayServiceProvider',

)
--------


app/config/app.php -> aliases:
--------
'aliases' => array(
	// ...
    'Allpay' => 'Lionweng\Allpay\Facade\Allpay',
)
--------

#Setting
config -> app/config/laravel_4_allpay.php：
--------
<?php
return array(

    'ServiceURL' => "https://payment.allpay.com.tw/Cashier/AioCheckOut",
    'HashKey' => "hashkey",
    'HashIV' => "hashiv",
    'MerchantID' => "merchantid"

);



# Samples

###

--------
Allpay::instance()->Send['ReturnURL'] = "<<收到付款完成通知的伺服器端網址>>";
Allpay::instance()->Send['ClientBackURL'] = "<<歐付寶返回按鈕導向的瀏覽器端網址>>";
Allpay::instance()->Send['OrderResultURL'] = "<<收到付款完成通知的瀏覽器端網址>>";
Allpay::instance()->Send['ChoosePayment'] = PaymentMethod::ALL;
....
array_push(Allpay::instance()->Send['Items'], array('Name' => "<<產品C>>", 'Price' => (int)"<<單價>>",
'Currency' => "<<幣別>>", 'Quantity' => (int) "<<數量>>", 'URL' => "<<產品說明位址>>"));

Allpay::instance()->CheckOut();


#Advanced

Allpay::instance() -> Allpay::i()
