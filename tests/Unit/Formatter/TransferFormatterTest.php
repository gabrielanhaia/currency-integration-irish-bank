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
            ->setAccountNumber(12312421)
            ->setAgencyNumber(123);

        $accountDestination = new AccountEntity;
        $accountDestination->setName('PEOPLE RECEIVE')
            ->setAccountNumber(12312421)
            ->setAgencyNumber(123);

        $transferEntityToBeFormatted = new TransferEntity;
        $transferEntityToBeFormatted->setAccountOrigin($accountOrigin)
            ->setAccountDestination($accountDestination)
            ->setTotal(1000);

        $expectedResponse = [
            'total_reais' => $transferEntityToBeFormatted->getTotal(),
            'usuario_origem_nome' => $transferEntityToBeFormatted->getAccountOrigin()->getName(),
            'usuario_origem_agencia' => $transferEntityToBeFormatted->getAccountOrigin()->getAgencyNumber(),
            'usuario_origem_conta' => $transferEntityToBeFormatted->getAccountOrigin()->getAccountNumber(),
            'usuario_destino_nome' => $transferEntityToBeFormatted->getAccountDestination()->getName(),
            'usuario_destino_agencia' => $transferEntityToBeFormatted->getAccountDestination()->getAgencyNumber(),
            'usuario_destino_conta' => $transferEntityToBeFormatted->getAccountDestination()->getAccountNumber(),
        ];

        $transferFormatter = new TransferFormatter;
        $response = $transferFormatter->format($transferEntityToBeFormatted);

        $this->assertEquals($expectedResponse, $response);
    }
}