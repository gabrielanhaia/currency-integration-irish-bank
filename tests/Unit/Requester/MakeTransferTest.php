<?php


namespace Tests\Unit\Requester;

use CurrencyFair\IntegrationIrishBank\Integration\Requester\MakeTransfer;
use GuzzleHttp\Client;
use Tests\TestCase;

/**
 * Class MakeTransferTest responsible for the tests on the requester (MakeTransfer).
 * @package Tests\Unit\Requester
 *
 * @author Gabriel Anhaia <gabriel@gmail.com>
 */
class MakeTransferTest extends TestCase
{
    /**
     * Test error when there is no base url (API) defined.
     * @throws \Exception
     */
    public function testErrorBaseUrlNotDefine()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Base url api must be on the .ENV (API_IRISH_BANK_BASE_URL)');

        putenv('API_IRISH_BANK_BASE_URL=');
        $makeTransferRequester = new MakeTransfer(new Client);
        $makeTransferRequester->makeTransfer(['DATA_TO_BE_SENT']);
    }

    /**
     * Test request error or server error trying to make a transfer.
     */
    public function testErrorRequestMakingTransfer()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Error making transfer (Brazilian bank).');

        $postData = ['POST_DATA' => 'TEST'];
        $configBaseUrl = 'BASE_URL_TEST';
        putenv("API_IRISH_BANK_BASE_URL={$configBaseUrl}");

        $expectedEndpoint = "{$configBaseUrl}/irish-bank/make-transfer";
        $guzzleHttpClientMock = \Mockery::mock(Client::class);
        $guzzleHttpClientMock->expects('post')
            ->once()
            ->with($expectedEndpoint, [
                'form_params' => $postData
            ])
            ->andReturnSelf();

        $guzzleHttpClientMock->expects('getStatusCode')
            ->once()
            ->withNoArgs()
            ->andReturn(402);

        $makeTransferRequester = new MakeTransfer($guzzleHttpClientMock);
        $makeTransferRequester->makeTransfer($postData);
    }

    /**
     * Test success making transfers on the Brazilian bank.
     */
    public function testSuccessMakingTransfer()
    {
        $postData = ['POST_DATA' => 'TEST'];
        $configBaseUrl = 'BASE_URL_TEST';
        putenv("API_IRISH_BANK_BASE_URL={$configBaseUrl}");

        $expectedEndpoint = "{$configBaseUrl}/irish-bank/make-transfer";
        $guzzleHttpClientMock = \Mockery::mock(Client::class);
        $guzzleHttpClientMock->expects('post')
            ->once()
            ->with($expectedEndpoint, [
                'form_params' => $postData
            ])
            ->andReturnSelf();

        $guzzleHttpClientMock->expects('getStatusCode')
            ->once()
            ->withNoArgs()
            ->andReturn(202);

        $guzzleHttpClientMock->expects('getBody')
            ->once()
            ->withNoArgs()
            ->andReturnSelf();

        $expectedResponse = '{"numero_confirmacao": 232331232, "data_processamento": "2019-01-02"}';

        $guzzleHttpClientMock->expects('getContents')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResponse);

        $makeTransferRequester = new MakeTransfer($guzzleHttpClientMock);
        $response = $makeTransferRequester->makeTransfer($postData);

        $this->assertEquals($expectedResponse, $response);
    }
}