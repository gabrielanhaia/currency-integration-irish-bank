<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Entity;

/**
 * Class TransferEntity
 * @package CurrencyFair\IntegrationBrazillianBank\Integration
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferEntity
{
    /** @var AccountEntity $accountOrigin Account origin of the money. */
    protected $accountOrigin;

    /** @var AccountEntity $accountDestination Account where the money will be transferred. */
    protected $accountDestination;

    /** @var float $total Total of money to be transferred. */
    protected $total;

    /** @var ReceiptTransferEntity $receipt Date of the confirmation after the money be accepted. */
    protected $receipt;

    /**
     * @return AccountEntity
     */
    public function getAccountOrigin(): AccountEntity
    {
        return $this->accountOrigin;
    }

    /**
     * @param AccountEntity $accountOrigin
     * @return TransferEntity
     */
    public function setAccountOrigin(AccountEntity $accountOrigin): TransferEntity
    {
        $this->accountOrigin = $accountOrigin;
        return $this;
    }

    /**
     * @return AccountEntity
     */
    public function getAccountDestination(): AccountEntity
    {
        return $this->accountDestination;
    }

    /**
     * @param AccountEntity $accountDestination
     * @return TransferEntity
     */
    public function setAccountDestination(AccountEntity $accountDestination): TransferEntity
    {
        $this->accountDestination = $accountDestination;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return TransferEntity
     */
    public function setTotal(float $total): TransferEntity
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return ReceiptTransferEntity
     */
    public function getReceipt(): ReceiptTransferEntity
    {
        return $this->receipt;
    }

    /**
     * @param ReceiptTransferEntity $receipt
     * @return TransferEntity
     */
    public function setReceipt(ReceiptTransferEntity $receipt): TransferEntity
    {
        $this->receipt = $receipt;
        return $this;
    }
}