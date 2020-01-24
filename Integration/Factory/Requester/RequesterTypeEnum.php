<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class RequesterTypeEnum
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 * @method static REQUESTER_MAKE_TRANSACTION()
 */
class RequesterTypeEnum extends AbstractEnumeration
{
    /** @var string REQUESTER_MAKE_TRANSACTION Requester responsible for making transfer.  */
    const REQUESTER_MAKE_TRANSACTION = 'REQUESTER_MAKE_TRANSACTION';
}