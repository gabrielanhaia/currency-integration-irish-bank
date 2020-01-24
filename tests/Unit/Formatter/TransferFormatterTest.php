<?php


namespace Tests\Unit\Formatter;

use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\AccountEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\TransferEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Formatter\TransferFormatter;
use Tests\TestCase;

/**
 * Class TransferFormatterTest responsible for the tests related to the transfer formatter.
 * @package Tests\Unit\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferFormatterTest extends TestCase
{
    /**
     * Test success formatting a transfer which will be sent to the API.
     */
    public function testSuccessFormattingATransfer()
    {
        $accountOrigin = new AccountEntity;
        $accountOrigin->setName('MAIN BANK BRAZIL')
            ->setIban(12312421);

        $accountDestination = new AccountEntity;
        $accountDestination->setName('PEOPLE RECEIVE')
            ->setIban(12312421);

        $transferEntityToBeFormatted = new TransferEntity;
        $transferEntityToBeFormatted->setAccountOrigin($accountOrigin)
            ->setAccountDestination($accountDestination)
            ->setTotal(1000);

        $expectedResponse = [
            'total' => $transferEntityToBeFormatted->getTotal(),
            'user_name_origin' => $transferEntityToBeFormatted->getAccountOrigin()->getName(),
            'iban_origin' => $transferEntityToBeFormatted->getAccountOrigin()->getIban(),
            'user_name_destination' => $transferEntityToBeFormatted->getAccountDestination()->getName(),
            'iban_destination' => $transferEntityToBeFormatted->getAccountDestination()->getIban(),
        ];

        $transferFormatter = new TransferFormatter;
        $response = $transferFormatter->format($transferEntityToBeFormatted);

        $this->assertEquals($expectedResponse, $response);
    }
}