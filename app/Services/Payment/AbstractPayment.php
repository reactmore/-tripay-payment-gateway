<?php

namespace Reactmore\Tripay\Services\Payment;

use Exception;
use Reactmore\Tripay\Helpers\Formats\ResponseFormatter;
use Reactmore\Tripay\Helpers\Formats\Url;
use Reactmore\Tripay\Helpers\Request\Guzzle;
use Reactmore\Tripay\Helpers\Request\RequestFormatter;


abstract class AbstractPayment
{

    private $main, $api_url, $headers;

    public function __construct($data)
    {
        $this->main = $data;
        $this->api_url = Url::URL_API[$this->main->stage];

        $this->headers = [
            "Authorization" => 'Bearer ' . $this->main->credential['apiKey'],
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }


    abstract protected function getEndpoint();

    abstract protected function needValidations($payload);

    public function get($payload = [])
    {

        try {
            $this->needValidations($payload);
            $payload = RequestFormatter::formatArrayKeysToSnakeCase($payload);

            $response = Guzzle::sendRequest($this->api_url . $this->getEndpoint(), 'GET', $this->headers, $payload);

            $response = $response['data'];

            return ResponseFormatter::formatResponse($response);
        } catch (Exception $e) {
            return Guzzle::handleException($e);
        }
    }
}
