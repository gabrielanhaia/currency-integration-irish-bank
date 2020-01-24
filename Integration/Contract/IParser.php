<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Contract;

/**
 * Interface IParser
 * @package CurrencyFair\IntegrationIrishBank\Integration\Contract
 *
 * Default contract for all parsers.
 */
interface IParser
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     */
    public function parse($rawData);
}