<?php

namespace Tests;

use Reactmore\Tripay\Main;
use PHPUnit\Framework\TestCase;


class MainTest extends TestCase
{

    private $main;

    public function __construct()
    {
        parent::__construct();
        // Your construct here
        $this->main = new Main([
            'apiKey' => '',
            'privateKey' => '',
            'merchantCode' => '',
            'stage' => ''
        ]);
    }


    public function testInitPayment()
    {
        $payload = ['code' => 'BRIVA'];

        $check = $this->main->initPayment()->Instructions()->get($payload);

        $this->assertSame(true, is_array($check));
    }

    public function testInitMerchant()
    {
        $check = $this->main->initMerchant()->paymentchannel()->get();

        $this->assertSame(true, is_array($check));
    }

    public function testCalculator()
    {
        $check = $this->main->initMerchant()->calculator()->get([
            'amount' => 50000
        ]);

        $this->assertSame(true, is_array($check));
    }
}
