<?php


namespace SchGroup\PostAffiliatePro\Components;


class GetSaleResponse
{
    const ID_COLUMN = 'id';

    const TRANSACTION_ID_COLUMN = 'transid';

    const CAMPAIGN_ID_COLUMN = 'campaignid';

    const ORDER_ID_COLUMN = 'orderid';

    const COMMISSION_COLUMN = 'commission';

    const USER_ID_COLUMN = 'userid';

    const TOTAL_COST = 'totalcost';

    const STATUS = 'rstatus';

    const CREATED_AT = 'dateinserted';
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $transactionId;
    /**
     * @var string
     */
    private $campaignId;
    /**
     * @var string
     */
    private $commission;
    /**
     * @var string
     */
    private $userId;
    /**
     * @var float
     */
    private $totalCost;
    /**
     * @var string
     */
    private $status;

    /** @var \DateTime string */
    private $createdAt;

    /**
     * SaleRetrieved constructor.
     * @param string $id
     * @param string $transactionId
     * @param string $campaignId
     * @param string $commission
     * @param string $userId
     * @param float $totalCost
     * @param string $status
     * @param string $createdAt
     */
    public function __construct(
        string $id,
        string $transactionId,
        string $campaignId,
        string $commission,
        string $userId,
        float $totalCost,
        string $status,
        string $createdAt
    ) {
        $this->id = $id;
        $this->transactionId = $transactionId;
        $this->campaignId = $campaignId;
        $this->commission = $commission;
        $this->userId = $userId;
        $this->totalCost = $totalCost;
        $this->status = $status;
        $this->createdAt = new \DateTime($createdAt);
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function getTotalCost(): float
    {
        return $this->totalCost;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @return string
     */
    public function getCampaignId(): string
    {
        return $this->campaignId;
    }

    /**
     * @return string
     */
    public function getCommission(): string
    {
        return $this->commission;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return \string[][]
     */
    public static function buildColumns(): array
    {
        return [
            [self::ID_COLUMN],
            [self::TRANSACTION_ID_COLUMN],
            [self::CAMPAIGN_ID_COLUMN],
            [self::ORDER_ID_COLUMN],
            [self::COMMISSION_COLUMN],
            [self::USER_ID_COLUMN],
            [self::TOTAL_COST],
            [self::STATUS],
            [self::CREATED_AT],
        ];
    }
}