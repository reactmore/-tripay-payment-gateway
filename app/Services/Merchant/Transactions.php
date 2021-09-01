<?php

namespace Reactmore\Tripay\Services\Merchant;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Transactions extends AbstractMerchant
{

    protected function getEndpoint()
    {
        return '/merchant/transactions';
    }

    protected function needValidations($payload)
    {
        return false;
    }
}
