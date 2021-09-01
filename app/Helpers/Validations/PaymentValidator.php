<?php

namespace Reactmore\Tripay\Helpers\Validations;

class PaymentValidator
{
    public static function validateIntructionsRequest($request)
    {
        ValidationHelper::validateContentType($request);
        ValidationHelper::validateContentFields($request, ['code']);
    }
}
