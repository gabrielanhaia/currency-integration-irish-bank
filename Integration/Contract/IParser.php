<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Contract;

/**
 * Interface IParser
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Contract
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