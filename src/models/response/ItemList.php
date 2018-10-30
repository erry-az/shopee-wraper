<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 10:35
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models\response;


use ErryAz\ShopeeWrap\models\BaseResponse;
use Tightenco\Collect\Support\Collection;

class ItemList extends BaseResponse
{
    /** @var Collection */
    public $items;
    /** @var boolean */
    public $more;
}
