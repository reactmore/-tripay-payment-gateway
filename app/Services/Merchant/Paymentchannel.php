<?php

namespace Reactmore\Tripay\Services\Merchant;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Paymentchannel extends AbstractMerchant
{

    protected function getEndpoint()
    {
        return '/merchant/payment-channel';
    }

    protected function needValidations($bool, $payload = null)
    {
        if ($bool) {
            return MainValidator::validateIntructionsRequest($payload);
        }

        return;
    }
}
