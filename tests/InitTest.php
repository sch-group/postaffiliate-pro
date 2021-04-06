<?php

namespace SchGroup\Tests;

use Matomo\Ini\IniReader;
use PHPUnit\Framework\TestCase;
use SchGroup\PostAffiliatePro\Components\PostAffiliateConfig;


class InitTest extends TestCase
{

    /** @var PostAffiliateConfig */
    protected $postAffiliateConfig;

    /** @var array */
    protected $configForTest;

    /**
     * InitTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     * @throws \Matomo\Ini\IniReadingException
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = (new IniReader())->readFile(__DIR__ . '/config.ini');
        $this->postAffiliateConfig = new PostAffiliateConfig($config['host'], $config['login'], $config['password']);
        $this->configForTest = $config;
    }

    public function can_get_transaction_sale_by_order_id()
    {

    }

}