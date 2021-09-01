<?php

namespace Reactmore\Tripay\Services;

use Exception;
use Reactmore\Tripay\Main;
use Reactmore\Tripay\Services\Payment\Instructions;


class Init
{


    private $init;

    public function __construct(Main $data)
    {
        $this->init = $data;
    }

    public function getPayment()
    {
        return new Instructions($this->init);
    }
}
