<?php

namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester;

use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransferParser;
use CurrencyFair\IntegrationBrazillianBank\Integration\Requester\MakeTransfer;
use GuzzleHttp\Client;

/**
 * Class RequesterSimpleFactory
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class RequesterSimpleFactory
{
    /**
     * Method responsible for creating a requester class.
     *
     * @param RequesterTypeEnum $requesterTypeEnum
     * @return MakeTransfer
     * @throws \Exception
     */
    public function make(RequesterTypeEnum $requesterTypeEnum)
    {
        switch ($requesterTypeEnum->value()) {
            case RequesterTypeEnum::REQUESTER_MAKE_TRANSACTION:
                return new MakeTransfer(new Client);
                break;
            default:
                throw new \Exception('Type of requester not implemented.');
        }
    }
}