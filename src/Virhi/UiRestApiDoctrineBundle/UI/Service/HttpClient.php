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

    public function delete($url)
    {
        $request  = $this->client->delete($url);
        $response = $this->client->send($request);
        $json     = $response->json();

        return $json;
    }

    /**
     * @param $url
     * @param $postBody
     * @return \Guzzle\Http\Message\RequestInterface
     */
    public function post($url, $postBody)
    {
        $result  = null;
        $headers = array(
            'Content-Type' => 'application/json'
        );

        $options = array();
        $request = $this->client->post($url, $headers, json_encode($postBody), $options);

        try {
            $reponse = $this->client->send($request);
            $result  = $reponse->getStatusCode();
        } catch (\Exception $e) {
            $result = 'error';
        }

        return $result;
    }

    /**
     * @param $url
     * @param $postBody
     * @return \Guzzle\Http\Message\RequestInterface
     */
    public function put($url, $postBody)
    {

        $result  = null;
        $headers = array(
            'Content-Type' => 'application/json'
        );

        $options = array();
        $request = $this->client->put($url, $headers, json_encode($postBody), $options);

        try {
            $reponse = $this->client->send($request);
            $result  = $reponse->getStatusCode();
        } catch (\Exception $e) {
            $result = 'error';
        }

        return $result;
    }
} 