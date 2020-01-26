<?php

require_once('../vendor/autoload.php');

use CurrencyFair\IntegrationIrishBank\Integration\{Entity\AccountEntity, Client, Entity\TransferEntity};

putenv('API_IRISH_BANK_BASE_URL=http://localhost:8001/api');

$client = new Client;

$accountOrigin = new AccountEntity;
$accountOrigin->setName('MAIN BANK BRAZIL')
    ->setIban(12312421);

$accountDestination = new AccountEntity;
$accountDestination->setName('PEOPLE RECEIVE')
    ->setIban(12312421);

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