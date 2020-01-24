<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Requester;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class AbstractRequester
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class AbstractRequester
{
    /** @var GuzzleClient $guzzleClient */
    protected $guzzleClient;

    /** @var string $baseUrlApi Url default API. */
    protected $baseUrlApi;

    /**
     * ListArticlesByTag constructor.
     * @param GuzzleClient $guzzleClient
     */
    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
        $this->baseUrlApi = getenv('API_BRAZILIAN_BANK_BASE_URL');
    }
}