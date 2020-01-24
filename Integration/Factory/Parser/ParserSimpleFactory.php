<?php

namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser;

use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransferParser;

/**
 * Class ParserFactory
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ParserSimpleFactory
{
    /**
     * Method responsible for creating and instance new parsers.
     *
     * @param ParserTypeEnum $parserTypeEnum
     * @return TransferParser
     * @throws \Exception
     */
    public function make(ParserTypeEnum $parserTypeEnum)
    {
        switch ($parserTypeEnum->value()) {
            case ParserTypeEnum::PARSER_TRANSACTION:
                return new TransferParser;
                break;
            default:
                throw new \Exception('Type of parser not implemented.');
        }
    }
}