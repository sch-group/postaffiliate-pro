<?php

namespace SchGroup\PostAffiliatePro\Connectors;

use Pap_Api_Session;
use SchGroup\PostAffiliatePro\Components\PostAffiliateConfig;
use SchGroup\PostAffiliatePro\Exceptions\WrongPostAffiliateCredentialsException;

abstract class PostAffiliateConnector
{
    /**
     * @var PostAffiliateConfig
     */
    protected $postAffiliateConfig;
    /**
     * @var Pap_Api_Session
     */
    protected $session;

    /**
     * PostAffiliateConnector constructor.
     * @param PostAffiliateConfig $config
     */
    public function __construct(PostAffiliateConfig $config)
    {
        $this->postAffiliateConfig = $config;
        $this->session = new Pap_Api_Session($config->getHost() . "/scripts/server.php");
    }

    /**
     * @return PostAffiliateConfig
     */
    public function getPostAffiliateConfig(): PostAffiliateConfig
    {
        return $this->postAffiliateConfig;
    }

    /**
     * @throws WrongPostAffiliateCredentialsException
     */
    public function attemptLogin(): void
    {
        if (!$this->session->login(
            $this->getPostAffiliateConfig()->getLogin(),
            $this->getPostAffiliateConfig()->getPassword())
        ) {
            throw new WrongPostAffiliateCredentialsException(
                "Wrong merchant login or password"
            );
        }
    }
}