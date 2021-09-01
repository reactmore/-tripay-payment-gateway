<?php

namespace Reactmore\Tripay\Helpers\Validations;

class MainValidator
{
    public static function validateCredentialRequest($request)
    {
        ValidationHelper::validateContentType($request);
    }

    public static function validateIntructionsRequest($request)
    {
        ValidationHelper::validateContentType($request);
        ValidationHelper::validateContentFields($request, ['code']);
    }

    public static function validateCalculatorRequest($request)
    {
        ValidationHelper::validateContentType($request);
        ValidationHelper::validateContentFields($request, ['amount']);
    }
}
