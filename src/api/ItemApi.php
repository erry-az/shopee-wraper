<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 13:26
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\api;

use ErryAz\ShopeeWrap\Clients;
use ErryAz\ShopeeWrap\models\request\CategoriesByCountry;
use ErryAz\ShopeeWrap\Shopee;

class ItemApi
{
    /** @var Shopee  */
    private $shopee;
    /** @var Clients  */
    private $client;

    const ITEM_CATEGORIES_GET_BY_COUNTRY = "/item/categories/get_by_country";
    const ITEM_CATEGORIES_GET_BY_SHOPID = "/item/categories/get";

    public function __construct(Clients $client)
    {
        $this->client = $client;
        $this->shopee = $client->shopee;
    }

    public function getCategoriesByCountry(string $country = "ID", int $is_cb = 0){
        $request = new CategoriesByCountry;
        $request->country = $country;
        $request->is_cb = $is_cb;
        return $this->shopee->send(self::ITEM_CATEGORIES_GET_BY_COUNTRY, $request);
    }

    public function getCategoriesByShopID(int $shopid){
        $this->shopee->shop_id = $shopid;
        return $this->shopee->send(self::ITEM_CATEGORIES_GET_BY_SHOPID);
    }
}
