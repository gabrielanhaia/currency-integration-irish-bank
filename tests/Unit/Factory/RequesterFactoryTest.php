<?php


namespace Tests\Unit\Factory;

use CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester\RequesterSimpleFactory;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester\RequesterTypeEnum;
use CurrencyFair\IntegrationIrishBank\Integration\Requester\MakeTransfer;
use GuzzleHttp\Client;
use Tests\TestCase;

/**
 * Class RequesterFactoryTest
 * @package Tests\Unit\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class RequesterFactoryTest extends TestCase
{
    /**
     * Test the success making a transfer requester using the simple factory.
     */
    public function testSuccessMakingTransferRequester()
    {
        $expectedRequester = new MakeTransfer(new Client);

        $requesterFactory = new RequesterSimpleFactory;
        $resultRequester = $requesterFactory->make(RequesterTypeEnum::REQUESTER_MAKE_TRANSACTION());

        $this->assertEquals($expectedRequester, $resultRequester);
    }
}