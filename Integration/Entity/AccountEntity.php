<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Entity;

/**
 * Class AccountEntity
 * @package CurrencyFair\IntegrationIrishBank\Integration
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class AccountEntity
{
    /** @var string $name Name of the owner/company. */
    protected $name;

    /** @var string $iban Account number. */
    protected $iban;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AccountEntity
     */
    public function setName(string $name): AccountEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return AccountEntity
     */
    public function setIban(string $iban): AccountEntity
    {
        $this->iban = $iban;
        return $this;
    }
}