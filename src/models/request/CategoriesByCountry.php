<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 10:50
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models\request;

use ErryAz\ShopeeWrap\models\BaseRequest;

class CategoriesByCountry extends BaseRequest
{
    /** @var string */
    public $country;
    /** @var int */
    public $is_cb;
}
