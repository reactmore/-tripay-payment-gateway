<?php

namespace Reactmore\Tripay\Services\Transactions\Close;

use Exception;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Detail extends AbstractCloseTransactions
{

    protected function getEndpoint()
    {
        return '/transaction/detail';
    }

    protected function needValidations($payload)
    {
        return MainValidator::validateDetailTransactionsRequest($payload);
    }
}
