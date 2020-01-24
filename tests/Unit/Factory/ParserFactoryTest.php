<?php


namespace Tests\Unit\Factory;

use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser\ParserSimpleFactory;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser\ParserTypeEnum;
use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransferParser;
use Tests\TestCase;

/**
 * Class ParserFactoryTest
 * @package Tests\Unit\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ParserFactoryTest extends TestCase
{
    /**
     * Test the success making a transfer parser using the simple factory.
     */
    public function testSuccessMakingTransferParser()
    {
        $expectedParser = new TransferParser();

        $transferParserFactory = new ParserSimpleFactory;
        $resultParser = $transferParserFactory->make(ParserTypeEnum::PARSER_TRANSACTION());

        $this->assertEquals($expectedParser, $resultParser);
    }
}