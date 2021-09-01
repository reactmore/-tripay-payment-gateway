<?php

namespace Reactmore\Tripay\Services\Transactions\Open;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Transactions extends AbstractOpenTransactions
{

    protected function getEndpoint()
    {
        return '/open-payment/{uuid}/transactions';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateDetailOpenTransactionsRequest($payload);
    }
}
