<?php


namespace Tests\Unit\Parser;

use CurrencyFair\IntegrationIrishBank\Integration\Entity\ReceiptTransferEntity;
use CurrencyFair\IntegrationIrishBank\Integration\Parser\TransferParser;
use Tests\TestCase;

/**
 * Class TransferParserTest with the tests related to the parser of transfers.
 * @package Tests\Unit\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferParserTest extends TestCase
{
    /**
     * Test error trying parse the response of transfers and returning an invalid confirmation number.
     *
     * @dataProvider dataProviderTestErrorConfirmationNumberInvalid
     *
     * @param string $dataToBeParsed
     * @throws \Exception
     */
    public function testErrorConfirmationNumberInvalid(string $dataToBeParsed)
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Confirmation number invalid.');

        $parser = new TransferParser;
        $parser->parse($dataToBeParsed);
    }

    /**
     * Data provider for the test {@see testErrorConfirmationNumberInvalid}
     *
     * @return array
     */
    public function dataProviderTestErrorConfirmationNumberInvalid()
    {
        return [
            [
                '{"numero_confirmacao": "", "data_processamento": "2019-01-02"}'
            ],
            [
                '{"data_processamento": "2019-01-02"}'
            ]
        ];
    }

    /**
     * Method responsible for testing the success parsing a transfer returned from the API.
     */
    public function testSuccessParseTransfer()
    {
        $dataToBeParsed = '{"confirmation_number": 1323221, "date": "2019-01-02"}';
        $expectedResult = new ReceiptTransferEntity;
        $expectedResult->setConfirmationNumber('CN:1323221')
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', '2019-01-02'));

        $parser = new TransferParser;
        $result = $parser->parse($dataToBeParsed);

        $this->assertEquals($expectedResult, $result);
    }
}