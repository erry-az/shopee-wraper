<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 10:33
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models\response;


use ErryAz\ShopeeWrap\models\Item;
use ErryAz\ShopeeWrap\models\BaseResponse;

class ItemDetail extends BaseResponse
{
    /** @var Item */
    public $item;
    /** @var string */
    public $warning;
}
