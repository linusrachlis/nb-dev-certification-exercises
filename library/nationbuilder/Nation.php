<?php

namespace library\nationbuilder;

class Nation
{
    private $nationSlug;
    private $apiKey;

    /**
     * @param string $nationSlug
     * @param string $apiKey
     */
    public function __construct($nationSlug, $apiKey)
    {
        $this->nationSlug = $nationSlug;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $params Query string
     * @param array $data Payload
     * @return array Response data
     * @throws \Exception On non-200 response
     */
    public function request($method, $url, array $params = null, array $data = null)
    {
        if (!isset($params)) {
            $params = [];
        }
        $params['access_token'] = $this->apiKey;
        $url = ltrim($url, '/');

        $client = new \Zend_Http_Client();
        $fullUrl = "https://$this->nationSlug.nationbuilder.com/api/v1/$url";
        $client
            ->setMethod($method)
            ->setUri($fullUrl)
            ->setParameterGet($params)
            ->setHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]);

        if (isset($data)) {
            $client->setRawData(json_encode($data));
        }

        $response = $client->request();
        if (!$response->isSuccessful()) {
            $responseData = json_decode($response->getBody(), true);
            if (!is_array($responseData)) {
                $responseData = $response->getBody();
            }
            throw new \Exception("API request failed: " . var_export($responseData, true));
        }

        $responseData = json_decode($response->getBody(), true);
        return $responseData;
    }

}
