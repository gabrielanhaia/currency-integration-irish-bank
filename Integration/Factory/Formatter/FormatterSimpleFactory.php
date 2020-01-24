<?php

namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Formatter;

use CurrencyFair\IntegrationBrazillianBank\Integration\Formatter\TransferFormatter;

/**
 * Class FormatterFactory
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FormatterSimpleFactory
{
    /**
     * Method responsible for creating
     *
     * @param FormatterTypeEnum $formatterTypeEnum
     * @return TransferFormatter
     * @throws \Exception
     */
    public function make(FormatterTypeEnum $formatterTypeEnum)
    {
        switch ($formatterTypeEnum->value()) {
            case FormatterTypeEnum::FORMATTER_TRANSACTION:
                return new TransferFormatter;
                break;
            default:
                throw new \Exception('Type of formatter not implemented.');
        }
    }
}