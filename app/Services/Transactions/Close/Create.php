<?php

namespace Reactmore\Tripay\Services\Transactions\Close;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Create extends AbstractCloseTransactions
{

    protected function getEndpoint()
    {
        return '/transaction/create';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateCreateTransactionsRequest($payload);
    }
}
