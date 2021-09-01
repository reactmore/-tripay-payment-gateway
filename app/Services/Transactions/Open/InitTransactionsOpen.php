<?php

namespace Reactmore\Tripay\Services\Transactions\Open;

use Exception;
use Reactmore\Tripay\Main;


class InitTransactionsOpen
{
    private $init;

    private $endPoints = [];

    public function __construct(Main $data)
    {
        $this->init = $data;
    }

    public function __call($endpoint, array $args)
    {
        if (!isset($this->endPoints[$endpoint])) {
            $class = 'Reactmore\Tripay\Services\Transactions\Open\\' . ucfirst($endpoint);
            if (class_exists($class)) {
                $this->endPoints[$endpoint] = new $class($this->init);
            } else {
                throw new Exception('Endpoint "' . $endpoint . '" does not exist"');
            }
        }

        return $this->endPoints[$endpoint];
    }
}
