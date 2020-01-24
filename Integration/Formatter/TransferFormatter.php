<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Formatter;

use CurrencyFair\IntegrationBrazillianBank\Integration\Contract\IFormattter;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\TransferEntity;

/**
 * Class TransferFormatter
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Formatter
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
            'iban_origin' => $rawData->getAccountOrigin()->getAgencyNumber(),
            'user_name_destination' => $rawData->getAccountDestination()->getName(),
            'iban_destination' => $rawData->getAccountDestination()->getAgencyNumber(),
        ];

        return $formattedData;
    }
}