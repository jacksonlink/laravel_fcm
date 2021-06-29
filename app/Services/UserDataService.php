<?php

namespace App\Services;
use App\Contracts\ExternalDataInterface;

class UserDataService implements ExternalDataInterface
{
    protected $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    public function getData(string $endpoint)
    {
        $response = $this->client->get('/api/users');
        return $response;
    }
}