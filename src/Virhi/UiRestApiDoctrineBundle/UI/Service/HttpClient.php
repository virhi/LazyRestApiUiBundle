<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 16:11
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Service;

use Guzzle\Service\Client;

class HttpClient
{
    /**
     * @var Client
     */
    protected $client;

    function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function load($url)
    {
        $request  = $this->client->get($url);
        $response = $this->client->send($request);
        $json     = $response->json();

        return $json;
    }
} 