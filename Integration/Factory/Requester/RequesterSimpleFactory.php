<?php

namespace CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester;

use CurrencyFair\IntegrationIrishBank\Integration\Parser\TransferParser;
use CurrencyFair\IntegrationIrishBank\Integration\Requester\MakeTransfer;
use GuzzleHttp\Client;

/**
 * Class RequesterSimpleFactory
 * @package CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester
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