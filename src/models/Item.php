<?php
/**
 * Created by eaz.
 * Date: 29/10/18
 * Time: 17:05
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models;


use Tightenco\Collect\Support\Collection;

class Item extends BaseRequest
{
    /** @var integer */
    public $item_id;
    /** @var integer */
    public $shopid;
    /** @var string */
    public $item_sku;
    /** @var ItemStatusEnum */
    public $status;
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var array */
    public $images;
    /** @var string */
    public $currency;
    /** @var boolean */
    public $has_variation;
    /** @var float */
    public $price;
    /** @var integer */
    public $stock;
    /** @var float */
    public $weight;
    /** @var integer */
    public $category_id;
    /** @var float */
    public $original_price;
    /** @var Collection */
    public $variations;
    /** @var Collection */
    public $attributes;
    /** @var Collection */
    public $logistics;
    /** @var Collection */
    public $wholesales;
    /** @var float */
    public $rating_star;
    /** @var integer */
    public $cmt_count;
    /** @var integer */
    public $sales;
    /** @var integer */
    public $views;
    /** @var integer */
    public $likes;
    /** @var integer */
    public $package_length;
    /** @var integer */
    public $package_width;
    /** @var integer */
    public $package_height;
    /** @var integer */
    public $days_to_ship;
    /** @var string */
    public $size_chart;
    /** @var string */
    public $condition;
    /** @var integer */
    public $discount_id;
    /** @var integer */
    public $create_time;
    /** @var integer */
    public $update_time;
}
