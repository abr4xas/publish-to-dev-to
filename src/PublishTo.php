<?php

namespace Abr4xas\PublishToDevTo;

use Abr4xas\PublishToDevTo\Exceptions\GenericException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class PublishTo
{
    protected string $apiKey;

    const BASE_URL = 'https://dev.to';

    public function __construct(string $apiKey)
    {
        if (empty($apiKey)) {
            throw new GenericException('We need an API key...');
        }
        $this->apiKey = $apiKey;
    }

    /**
     * Undocumented function
     *
     * @param array $article
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function devToMyArticle(array $article)
    {
        return $this->makeRequest('/api/articles', $article, 'POST');
    }

    /**
     * Undocumented function
     *
     * @param string $url
     * @param array $fields
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function makeRequest(string $url, array $fields, string $method)
    {
        $client = new Client([
            'base_uri' => self::BASE_URL,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'api-key' => $this->apiKey,
            ],
        ]);

        try {
            $request = $client->request(
                $method,
                $url,
                [
                    'json' => $fields,
                ],
            );


            $body = $request->getBody()->getContents();
            $obj = json_decode($body, true);

            return $obj;
        } catch (ConnectException $e) {
            throw new GenericException('Cannot connect to https://dev.to/api');
        }
    }
}
