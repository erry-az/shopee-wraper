<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 13:28
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap;


use ErryAz\ShopeeWrap\api\ItemApi;

class Clients
{
    public $shopee;
    public function __construct(array $config)
    {
        $this->shopee = new Shopee($config);
    }

    public function item(){
        return new ItemApi($this);
    }
}
