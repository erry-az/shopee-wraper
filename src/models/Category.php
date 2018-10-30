<?php
/**
 * Created by eaz.
 * Date: 30/10/18
 * Time: 10:52
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap\models;


class Category
{
    /** @var integer */
    public $parent_id;
    /** @var boolean */
    public $has_children;
    /** @var integer */
    public $category_id;
    /** @var string */
    public $category_name;
}
