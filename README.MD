Tripay Payment Gateway Client Library
===============
[![Latest Stable Version](http://poser.pugx.org/reactmore/tripay-payment-gateway/v)](https://packagist.org/packages/reactmore/tripay-payment-gateway) [![License](http://poser.pugx.org/reactmore/tripay-payment-gateway/license)](https://packagist.org/packages/reactmore/tripay-payment-gateway) [![Total Downloads](http://poser.pugx.org/reactmore/tripay-payment-gateway/downloads)](https://packagist.org/packages/reactmore/tripay-payment-gateway)

For details please visit Official [Documentation](https://payment.tripay.co.id/developer).

## Instalation

```
composer require reactmore/tripay-payment-gateway
```

## Configuration
```php
require __DIR__ . '/vendor/autoload.php';

use Reactmore\Tripay\Main;

$data = new Main([
    'apiKey' => 'Your-Apikey',
    'privateKey' => 'Your-Private-Key',
    'merchantCode' => 'Your Merchant',
    'stage' => 'sandbox or Productions'
]);

$init = $data->init()->getPayment();

// Payload Must Array
$payload = ['code' => 'BRIVA'];

echo '<pre>';
print_r($init->getInstructions($payload));
echo '</pre>';
```

If you are using Dot ENV you can add a Field in env.example and only need to call the main class

```php
require __DIR__ . '/vendor/autoload.php';

use Reactmore\Tripay\Main;

$data = new Main();

$init = $data->init()->initMerchant();

// Payload Must Array
$payload = ['code' => 'BRIVA'];

echo '<pre>';
print_r($init->instructions()->get($payload));
echo '</pre>';
```

Callback Handler 
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Reactmore\Tripay\Main;

$data = new Main();

$init = $data->initCallback();

if ($init->validateSignature()) {

    if ($init->callEvent() === 'payment_status') {
        // Response Callback
        $data = json_encode($init->get(), true);

        // Get Status From Data
        $status = $data['status'];

        if ($status === 'PAID') {
            // Your Logic
            echo $status;
        } elseif ($status === 'PAID') {
            // Your Logic
            echo $status;
        } elseif ($status === 'UNPAID') {
            // Your Logic
            echo $status;
        } elseif ($status === 'REFUND') {
            // Your Logic
            echo $status;
        } elseif ($status === 'EXPIRED') {
            // Your Logic
            echo $status;
        } else {
            // Your Logic
            echo $status; // Failed
        }
    }
    // IF ERROR FROM SYSTEM THROW IN THIS SECTIONS 

    // PUT RESPONSE CALLBACK TO CALLBACK-TRIPAY.JSON
    file_put_contents(__DIR__ . '/callback-tripay.json', $init->get() . PHP_EOL . PHP_EOL, FILE_APPEND | LOCK_EX);
} else {
    echo  'Invalid Signature! ';
    exit;
}
```

## Method

| API  | Method | Endpoint | Status |
|---|---|---|---|
| `PAYMENT Method`| `initPayment()` | `instructions()` | OK |
| `MERCHANT Method`|  `initMerchant()` | `paymentchannel()`, `calculator()`, `transactions` | OK |
| `TRANSACTIONS CLOSE`|  `initTransactions()`| `transactions()`, `detail()`, `create()` | OK |
| `TRANSACTIONS OPEN`| `initTransactionsOpen()` | `transactions()`, `detail()`, `create()` | OK |
| `CALLBACK`|  `InitCallback()` | `signature()`, `callbackSignature()`, `validateSignature()`, `CallEvent()`| OK |
| `PPOB`|  `InitPPOB()` | | Progress |

## For Handle Actions 


| CODE  | MESSAGE |
|---|---|
| `408` | Connection Timeout Error. Please check your internet connection and try again |
| `400` | Message From API Check Documentation |
| `200` | Valid |

Validation Request
Return Throw;
| THROW  | What Is |
|---|---|
| `Missing arguements exception. Content fields must be complete` | Request is Valid but you forgot pass Main Argument |
| `Field {missingFields} is missing` | You must forget Field Require From API |
| `Content type must be array` | All request make from Array so code not pass if not in array



## License

Please see the [LICENSE](LICENSE) included in this repository for a full copy of the MIT license, which this project is licensed under.



