<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Contract;

/**
 * Interface IFormattter
 * @package CurrencyFair\IntegrationIrishBank\Integration\Contract
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