<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 9:53
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models;


class BaseRequest
{
    /** @var integer */
    public $partner_id;
    /** @var integer */
    public $shopid;
    /** @var integer */
    public $timestamp;

    public function __construct($partner_id = 0, $shopid = 0)
    {
        $this->partner_id = $partner_id;
        $this->shopid = $shopid;
        $this->timestamp = time();
    }
}
