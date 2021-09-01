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

$init = $data->init()->getPayment();

// Payload Must Array
$payload = ['code' => 'BRIVA'];

echo '<pre>';
print_r($init->getInstructions($payload));
echo '</pre>';
```

## To Do

| API  | Status |
|---|---|
| `PAYMENT Method` | OK |
| `MERCHANT Method` | Progress |
| `TRANSACTIONS CLOSE` | Progress |
| `TRANSACTIONS OPEN` | Progress |
| `CALLBACK` | Progress |
| `PPOB` | Progress |

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



