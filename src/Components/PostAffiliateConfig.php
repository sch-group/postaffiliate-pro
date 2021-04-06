<?php


namespace SchGroup\PostAffiliatePro\Components;


class PostAffiliateConfig
{
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $accountId;

    /**
     * PostAffiliateConfig constructor.
     * @param string $host
     * @param string $login
     * @param string $password
     * @param string|null $accountId
     */
    public function __construct(string $host, string $login, string $password, string $accountId = null)
    {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId ?? 'default1';
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}