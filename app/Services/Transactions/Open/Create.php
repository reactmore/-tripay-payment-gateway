<?php

namespace Reactmore\Tripay\Services\Transactions\Open;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Create extends AbstractOpenTransactions
{

    protected function getEndpoint()
    {
        return '/open-payment/create';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateCreateOpenTransactionsRequest($payload);
    }
}
