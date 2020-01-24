<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Entity;

/**
 * Class ReceiptTransferEntity
 * @package CurrencyFair\IntegrationIrishBank\Integration\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ReceiptTransferEntity
{
    /** @var string $confirmationNumber Number/code of the confirmation. */
    protected $confirmationNumber;

    /** @var \DateTime $dateConfirmation Date of the confirmation. */
    protected $dateConfirmation;

    /**
     * @return string
     */
    public function getConfirmationNumber(): string
    {
        return $this->confirmationNumber;
    }

    /**
     * @param string $confirmationNumber
     * @return ReceiptTransferEntity
     */
    public function setConfirmationNumber(string $confirmationNumber): ReceiptTransferEntity
    {
        $this->confirmationNumber = $confirmationNumber;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateConfirmation(): \DateTime
    {
        return $this->dateConfirmation;
    }

    /**
     * @param \DateTime $dateConfirmation
     * @return ReceiptTransferEntity
     */
    public function setDateConfirmation(\DateTime $dateConfirmation): ReceiptTransferEntity
    {
        $this->dateConfirmation = $dateConfirmation;
        return $this;
    }
}