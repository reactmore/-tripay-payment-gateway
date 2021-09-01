<?php

namespace Reactmore\Tripay\Services\Merchant;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Calculator extends AbstractMerchant
{

    protected function getEndpoint()
    {
        return '/merchant/fee-calculator';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateCalculatorRequest($payload);
    }
}
