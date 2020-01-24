<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Formatter;

use CurrencyFair\IntegrationIrishBank\Integration\Contract\IFormattter;
use CurrencyFair\IntegrationIrishBank\Integration\Entity\TransferEntity;

/**
 * Class TransferFormatter
 * @package CurrencyFair\IntegrationIrishBank\Integration\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferFormatter implements IFormattter
{
    /**
     * Parse raw data.
     *
     * @param TransferEntity $rawData
     * @return mixed
     */
    public function format($rawData)
    {
        $formattedData = [
            'total' => $rawData->getTotal(),
            'user_name_origin' => $rawData->getAccountOrigin()->getName(),
            'iban_origin' => $rawData->getAccountOrigin()->getIban(),
            'user_name_destination' => $rawData->getAccountDestination()->getName(),
            'iban_destination' => $rawData->getAccountDestination()->getIban(),
        ];

        return $formattedData;
    }
}