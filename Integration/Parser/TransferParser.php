<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Parser;


use CurrencyFair\IntegrationBrazillianBank\Integration\Contract\IParser;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\ReceiptTransferEntity;

/**
 * Class TransferParser
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferParser implements IParser
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     * @throws \Exception
     */
    public function parse($rawData)
    {
        $arrayRawData = json_decode($rawData, true);

        // I put these rules for different unit tests (scenarios).
        if (empty($arrayRawData['confirmation_number'])) {
            throw new \Exception('Confirmation number invalid.');
        }

        $confirmationNumber = 'CN:' . $arrayRawData['confirmation_number'];
        // ----------------

        $receiptTransfer = new ReceiptTransferEntity;
        $receiptTransfer->setConfirmationNumber($confirmationNumber)
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', $arrayRawData['date']));

        return $receiptTransfer;
    }
}