<?php

namespace Lionweng\Allpay;

use \Config;

class Manager{

    protected $allInOne;
    protected $helper;

    public function __construct()
    {
        $this->allInOne = new \AllInOne();
        $this->helper = new Helper();
    }

    public function instance()
    {
        return $this->allInOne;
    }

    public function i()
    {
        return $this->allInOne;
    }

    public function deadline($date)
    {
        return $this->helper->deadline($date);
    }

    public function loadConfigs()
    {
        $this->allInOne->ServiceURL = Config::get('laravel_4_allpay.ServiceURL');
        $this->allInOne->HashKey = Config::get('laravel_4_allpay.HashKey');
        $this->allInOne->HashIV = Config::get('laravel_4_allpay.HashIV');
        $this->allInOne->MerchantID = Config::get('laravel_4_allpay.MerchantID');
    }

    public function loadTestingConfigs()
    {
        /* 服務參數 */
        $this->allInOne->ServiceURL ="http://payment-stage.allpay.com.tw/Cashier/AioCheckOut";
        $this->allInOne->HashKey = "5294y06JbISpM5x9";
        $this->allInOne->HashIV = "v77hoKGq4kWxNNIS";
        $this->allInOne->MerchantID = "2000132";
        /* 基本參數 */
        $this->allInOne->Send['ReturnURL'] = "localhost";
        $this->allInOne->Send['ClientBackURL'] = "localhost";
        $this->allInOne->Send['MerchantTradeNo'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);;
        $this->allInOne->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');
        $this->allInOne->Send['TotalAmount'] = (int) "1000";
        $this->allInOne->Send['TradeDesc'] = "測試交易";
        array_push($this->allInOne->Send['Items'], array('Name' => "產品A", 'Price' => (int)"1000",
        'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "localhost"));
    }

}
