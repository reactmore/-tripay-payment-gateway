Tripay Payment Gateway Client Library
===============
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

## Example Method 

```php
Waiting
```


