<?php

namespace Reactmore\Tripay\Helpers\Validations;

class MainValidator
{
    public static function validateCredentialRequest($request)
    {
        ValidationHelper::validateContentType($request);
    }
}
