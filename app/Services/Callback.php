<?php

namespace Reactmore\Tripay\Services;

use Symfony\Component\HttpFoundation\Request;

class Callback
{

    public $request, $privateKey;


    public function __construct($data)
    {
        $this->privateKey = $data->credential['privateKey'];
        $this->request = Request::createFromGlobals();
    }


    public function get()
    {
        return $this->request->getContent();
    }

    public function signature()
    {
        return hash_hmac('sha256', $this->get(), $this->privateKey);
    }


    public function callbackSignature()
    {
        return isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';
    }

    public function callEvent()
    {
        return isset($_SERVER['HTTP_X_CALLBACK_EVENT']) ? $_SERVER['HTTP_X_CALLBACK_EVENT'] : '';
    }

    public function validateSignature(): bool
    {
        if ($this->callbackSignature() !== $this->signature()) {
            return false;
        }

        return true;
    }
}
