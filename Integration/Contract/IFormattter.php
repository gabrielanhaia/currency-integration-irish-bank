<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Contract;

/**
 * Interface IFormattter
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Contract
 *
 * Default contract for all parsers.
 */
interface IFormattter
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     */
    public function format($rawData);
}