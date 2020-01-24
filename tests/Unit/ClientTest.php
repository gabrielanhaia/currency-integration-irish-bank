<?php


namespace Tests;

use CurrencyFair\IntegrationIrishBank\Integration\Client;
use CurrencyFair\IntegrationIrishBank\Integration\Entity\AccountEntity;
use CurrencyFair\IntegrationIrishBank\Integration\Entity\ReceiptTransferEntity;
use CurrencyFair\IntegrationIrishBank\Integration\Entity\TransferEntity;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter\FormatterSimpleFactory;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter\FormatterTypeEnum;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Parser\ParserSimpleFactory;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Parser\ParserTypeEnum;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester\RequesterSimpleFactory;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Requester\RequesterTypeEnum;
use CurrencyFair\IntegrationIrishBank\Integration\Formatter\TransferFormatter;
use CurrencyFair\IntegrationIrishBank\Integration\Parser\TransferParser;
use CurrencyFair\IntegrationIrishBank\Integration\Requester\MakeTransfer;

/**
 * Class ClientTest
 *
 * Test the Facade (Client) responsible for the integration with the Brazilian bank.
 *
 * @package Tests
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ClientTest extends TestCase
{
    /**
     * Test success calling the method to make a transfer on the Client class.
     */
    public function testSuccessMakeTransfer()
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

        $transferEntityFormatted = ['ENTITY_FORMATTED'];
        $rawResultApi = '{API_RESULT}';
        $parsedResult = new ReceiptTransferEntity;
        $parsedResult->setConfirmationNumber(33213)
            ->setDateConfirmation(new \DateTime);

        $formatterMock = \Mockery::mock(TransferFormatter::class);
        $formatterMock->expects('format')
            ->once()
            ->with($transferEntityToBeFormatted)
            ->andReturn($transferEntityFormatted);

        $simpleFactoryFormatterMock = \Mockery::mock(FormatterSimpleFactory::class);
        $simpleFactoryFormatterMock->expects('make')
            ->once()
            ->with(FormatterTypeEnum::FORMATTER_TRANSACTION())
            ->andReturn($formatterMock);

        $parserMock = \Mockery::mock(TransferParser::class);
        $parserMock->expects('parse')
            ->once()
            ->with($rawResultApi)
            ->andReturn($parsedResult);

        $simpleFactoryParserMock = \Mockery::mock(ParserSimpleFactory::class);
        $simpleFactoryParserMock->expects('make')
            ->once()
            ->with(ParserTypeEnum::PARSER_TRANSACTION())
            ->andReturn($parserMock);

        $requesterMock = \Mockery::mock(MakeTransfer::class);
        $requesterMock->expects('makeTransfer')
            ->once()
            ->with($transferEntityFormatted)
            ->andReturn($rawResultApi);

        $simpleFactoryRequesterMock = \Mockery::mock(RequesterSimpleFactory::class);
        $simpleFactoryRequesterMock->expects('make')
            ->once()
            ->with(RequesterTypeEnum::REQUESTER_MAKE_TRANSACTION())
            ->andReturn($requesterMock);

        $expectedResultTransfer = clone $transferEntityToBeFormatted;
        $expectedResultTransfer->setReceipt($parsedResult);

        $client = new Client($simpleFactoryFormatterMock, $simpleFactoryParserMock, $simpleFactoryRequesterMock);
        $client->makeTransfer($transferEntityToBeFormatted);

        $this->assertEquals($expectedResultTransfer, $transferEntityToBeFormatted);
    }
}