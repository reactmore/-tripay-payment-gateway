<?php

namespace Reactmore\Tripay\Services\Payment;

use Exception;
use Reactmore\Tripay\Helpers\Formats\ResponseFormatter;
use Reactmore\Tripay\Helpers\Formats\Url;
use Reactmore\Tripay\Helpers\Request\Guzzle;
use Reactmore\Tripay\Helpers\Request\RequestFormatter;
use Reactmore\Tripay\Helpers\Validations\PaymentValidator;

class Instructions
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

    /**
     * @param array $payload
     * @return \Reactmore\Tripay\Helpers\Request\RequestFormatter
     * @throws \Reactmore\Tripay\Helpers\Request\Guzzle
     * Parameter : https://tripay.co.id/developer?tab=payment-instruction
     */

    public function getInstructions($payload = [])
    {

        try {
            PaymentValidator::validateIntructionsRequest($payload);
            $payload = RequestFormatter::formatArrayKeysToSnakeCase($payload);

            $response = Guzzle::sendRequest($this->api_url . '/payment/instruction?' . http_build_query($payload), 'GET', $this->headers);

            $response = $response['data'];

            return ResponseFormatter::formatResponse($response);
        } catch (Exception $e) {
            return Guzzle::handleException($e);
        }
    }
}
