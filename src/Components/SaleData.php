<?php

namespace SchGroup\PostAffiliatePro\Components;

class SaleData
{
    const PENDING_STATUS = 'P';

    const DECLINED_STATUS = 'D';

    const APPROVED_STATUS = 'A';

    const AVAILABLE_STATUSES = [
        self::PENDING_STATUS,
        self::APPROVED_STATUS,
        self::DECLINED_STATUS
    ];
    /**
     * @var float
     */
    private $total;
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var string|null
     */
    private $status;
    /**
     * @var string|null
     */
    private $productId;
    /**
     * @var string
     */
    private $accountId;
    /**
     * @var string
     */
    private $ip;
    /**
     * @var string|null
     */
    private $bannerId;
    /**
     * @var string|null
     */
    private $currency;
    /**
     * @var string|null
     */
    private $couponCode;
    /**
     * @var string|null
     */
    private $affiliateId;
    /**
     * @var string|null
     */
    private $campaignId;
    /**
     * @var string|null
     */
    private $channelId;
    /**
     * @var string|null
     */
    private $customCommission;
    /**
     * @var string|null
     */
    private $data;

    /**
     * SaleData constructor.
     * @param string $accountId
     * @param float $total
     * @param string $orderId
     * @param string|null $ip
     * @param string|null $status
     * @param string|null $bannerId
     * @param string|null $currency
     * @param string|null $productId
     * @param string|null $couponCode
     * @param string|null $affiliateId
     * @param string|null $campaignId
     * @param string|null $channelId
     * @param string|null $customCommission
     * @param array|null $customData
     */
    public function __construct(
        string $accountId,
        float $total,
        string $orderId,
        string $ip = null,
        string $status = null,
        string $bannerId = null,
        string $currency = null,
        string $productId = null,
        string $couponCode = null,
        string $affiliateId = null,
        string $campaignId = null,
        string $channelId = null,
        string $customCommission = null,
        string $customData = null
    ) {
        $this->ip = $ip;
        $this->total = $total;
        $this->status = $status;
        $this->orderId = $orderId;
        $this->data = $customData;
        $this->bannerId = $bannerId;
        $this->currency = $currency;
        $this->accountId = $accountId;
        $this->productId = $productId;
        $this->campaignId = $campaignId;
        $this->channelId = $channelId;
        $this->couponCode = $couponCode;
        $this->affiliateId = $affiliateId;
        $this->customCommission = $customCommission;
    }

    /**
     * @return string|null
     */
    public function getBannerId(): ?string
    {
        return $this->bannerId;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return string|null
     */
    public function getCouponCode(): ?string
    {
        return $this->couponCode;
    }

    /**
     * @return string|null
     */
    public function getAffiliateId(): ?string
    {
        return $this->affiliateId;
    }

    /**
     * @return string|null
     */
    public function getCampaignId(): ?string
    {
        return $this->campaignId;
    }

    /**
     * @return string|null
     */
    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    /**
     * @return string|null
     */
    public function getCustomCommission(): ?string
    {
        return $this->customCommission;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

}