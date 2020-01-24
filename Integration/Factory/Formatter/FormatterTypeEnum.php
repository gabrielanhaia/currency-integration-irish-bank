<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class Formatter
 * @package CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 * @method static FORMATTER_TRANSACTION()
 */
class FormatterTypeEnum extends AbstractEnumeration
{
    /** @var string FORMATTER_TRANSACTION Type of formatter for transfers response from the API. */
    const FORMATTER_TRANSACTION = 'FORMATTER_TRANSACTION';
}