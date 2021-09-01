<?php

namespace Reactmore\Tripay\Services\Payment;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;

class Instructions extends AbstractPayment
{

    protected function getEndpoint()
    {
        return '/payment/instruction';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateIntructionsRequest($payload);
    }
}
