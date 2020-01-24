<?php


namespace Tests\Unit\Factory;

use CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter\FormatterSimpleFactory;
use CurrencyFair\IntegrationIrishBank\Integration\Factory\Formatter\FormatterTypeEnum;
use CurrencyFair\IntegrationIrishBank\Integration\Formatter\TransferFormatter;
use Tests\TestCase;

/**
 * Class FormatterFactoryTest
 * @package Tests\Unit\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FormatterFactoryTest extends TestCase
{
    /**
     * Test the success making a transfer formatter using the simple factory.
     */
    public function testSuccessMakingTransferFormatter()
    {
        $expectedFormatter = new TransferFormatter;

        $transferFormatterFactory = new FormatterSimpleFactory;
        $resultFormatter = $transferFormatterFactory->make(FormatterTypeEnum::FORMATTER_TRANSACTION());

        $this->assertEquals($expectedFormatter, $resultFormatter);
    }
}