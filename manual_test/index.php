<?php

require_once('../vendor/autoload.php');

use CurrencyFair\IntegrationIrishBank\Integration\{Entity\AccountEntity, Client, Entity\TransferEntity};

putenv('API_BRAZILIAN_BANK_BASE_URL=http://localhost:8001/api');

$client = new Client;

$accountOrigin = new AccountEntity;
$accountOrigin->setName('MAIN BANK BRAZIL')
    ->setAccountNumber(12312421)
    ->setAgencyNumber(123);

$accountDestination = new AccountEntity;
$accountDestination->setName('PEOPLE RECEIVE')
    ->setAccountNumber(12312421)
    ->setAgencyNumber(123);

$transferEntity = new TransferEntity;
$transferEntity->setAccountOrigin($accountOrigin)
    ->setAccountDestination($accountDestination)
    ->setTotal(1000);

try {
    $client->makeTransfer($transferEntity);
} catch (Exception $e) {
    dd($e->getMessage());
}

dd($transferEntity->getReceipt());