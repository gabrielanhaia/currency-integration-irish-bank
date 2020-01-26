<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Requester;

use Exception;

/**
 * Class MakeTransfer responsible for make transfer at the Brazilian bank.
 * @package CurrencyFair\IntegrationIrishBank\Integration\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MakeTransfer extends AbstractRequester
{
    /**
     * Method responsible for making a transfer.
     *
     * @param array $transferData Data to be sent to the API.
     * @return string
     * @throws Exception
     */
    public function makeTransfer(array $transferData): string
    {
        if (empty($this->baseUrlApi)) {
            throw new \Exception('Base url api must be on the .ENV (API_IRISH_BANK_BASE_URL)');
        }

        $urlApi = "{$this->baseUrlApi}/irish-bank/make-transfer";

        $response = $this->guzzleClient->post($urlApi, [
            'form_params' => $transferData
        ]);

        // TODO: Create enum for the HTTP status codes.
        if ($response->getStatusCode() !== 202) {
            throw new \Exception('Error making transfer (Brazilian bank).');
        }

        return $response->getBody()
            ->getContents();
    }
}