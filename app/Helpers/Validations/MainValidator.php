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

    public static function validateCreateTransactionsRequest($request)
    {
        ValidationHelper::validateContentType($request);
        ValidationHelper::validateContentFields($request, [
            'method',
            'merchant_ref',
            'amount',
            'customer_name',
            'customer_email',
            'customer_phone',
            'order_items'
        ]);
    }

    public static function validateDetailTransactionsRequest($request)
    {
        ValidationHelper::validateContentType($request);
        ValidationHelper::validateContentFields($request, ['reference']);
    }
}
