<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 10:57
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models\response;


use ErryAz\ShopeeWrap\models\BaseResponse;
use Tightenco\Collect\Support\Collection;

class Categories extends BaseResponse
{
    /** @var Collection */
    public $categories;
}
