<?php
/**
 * Created by eaz.
 * Date: 29/10/18
 * Time: 17:04
 * Github: https://github.com/erry-az
 */

namespace ErryAz\ShopeeWrap;

use ErryAz\ShopeeWrap\models\BaseRequest;
use GuzzleHttp\Client;

class Shopee
{
    const conf = "shopee";
    const REDIRECT_FORMAT = "%s/api/v1/shop/auth_partner?id=%s&token=%s&redirect=%s";
    const S_URL = "https://partner.shopeemobile.com";
    const T_URL = "https://partner.uat.shopeemobile.com";
    /**
     * shopee partner id
     *
     * @var integer
     */
    public $partner_id;

    /**
     * shopee partner key
     *
     * @var string
     */
    public $partner_key;

    /**
     * shopee shop id
     *
     * @var integer
     */
    public $shop_id;

    /**
     * CodeIgniter instance
     *
     * @var object
     */
    private $CI;

    /**
     * query params
     *
     * @var array
     */
    private $query = array();

    /**
     * active url
     *
     * @var string
     */
    private $url;

    /**
     * guzzle http client
     *
     * @var object
     */
    private $client;

    /**
     * api version
     *
     * @var string
     */
    private $v;

    /**
     * initiate shoppeApi
     *
     * @param array $configs
     */
    public function __construct(array $configs = null)
    {
        if($configs == null) {
            $configs = $this->CI->config->item(self::conf);
        }
        $this->partner_id   = isset($configs['partner_id']) ? $configs['partner_id'] : 0;
        $this->partner_key  = isset($configs['partner_key']) ? $configs['partner_key'] : '';
        $this->shop_id      = isset($configs['shop_id']) ? $configs['shop_id'] : 0;
        $this->url          = isset($configs['production']) && $configs['production'] === TRUE ? self::S_URL : self::T_URL;
        $this->v            = isset($configs['version']) ? $configs['version'] : 'v1';

        $this->client       = new Client();
    }

    /**
     * @param int $partner_id
     * @param string $key
     * @param int $shop_id
     * @return Shopee
     */
    public function factory(int $partner_id, string $key, $shop_id = 0)
    {
        return new static(['partner_id' => $partner_id, 'partner_key' => $key, 'shop_id' => $shop_id]);
    }

    public function redirect(string $url, $algo = 'sha256')
    {
        $hash_token = hash($algo, $this->partner_key.$url);
        $redirect_url = sprintf(self::REDIRECT_FORMAT, $this->url, $this->partner_id, $hash_token, $url);

        return $redirect_url;
    }

    public function addQuery(string $key, string $val)
    {
        $this->query[$key] = $val;
    }

    public function addQueries(array $queries)
    {
        foreach ($queries as $key => $val) {
            $this->query[$key] = $val;
        }
    }

    public function send(string $path,BaseRequest $body = null)
    {
        if(is_subclass_of($body, BaseRequest::class))
        {
            $body->shopid = $this->shop_id;
            $body->partner_id = $this->partner_id;
            $body->timestamp = time();
        }

        $full_url = $this->url.'/api/'.$this->v.$path;

        $configs = [
            'headers'   =>  ['Authorization' => hash_hmac('sha256', $full_url.'|'.json_encode($body),
                            $this->partner_key)],
            'query'     =>  $this->query,
            'json'      =>  $body
        ];

        return $this->client->requestAsync("POST", $full_url, $configs);
    }
}
