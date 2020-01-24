<?php


namespace CurrencyFair\IntegrationIrishBank\Integration\Parser;


use CurrencyFair\IntegrationIrishBank\Integration\Contract\IParser;
use CurrencyFair\IntegrationIrishBank\Integration\Entity\ReceiptTransferEntity;
use CurrencyFair\IntegrationIrishBank\Integration\Exception\InvalidDataParserException;

/**
 * Class TransferParser
 * @package CurrencyFair\IntegrationIrishBank\Integration\Parser
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
            throw new InvalidDataParserException('Confirmation number invalid.');
        }

        $confirmationNumber = 'CN:' . $arrayRawData['confirmation_number'];
        // ----------------

        $receiptTransfer = new ReceiptTransferEntity;
        $receiptTransfer->setConfirmationNumber($confirmationNumber)
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', $arrayRawData['date']));

        return $receiptTransfer;
    }
}