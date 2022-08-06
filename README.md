# Laravel ThePeer

- [Documentation](#introduction)
- [Usage](#usage)
- [Support](#support)

## Installation

```php
composer require loki1729/laravel-thepeer
```

<a name="usage"></a>

## Usage

Following are some ways through which you can access the ThePeer provider:

```php
// Import the class namespaces first, before using it directly
use \Loki1729\LaravelThePeer\Services\ThePeer as ThePeerClient;

$the_peer_service = new ThePeerClient;

```

<a name="usage-thepeer-api-configuration"></a>

## Publish Config Folder

````php
 php artisan vendor:publish --provider "Loki1729\LaravelThePeer\ServiceProviders\ThePeerServiceProvider"

````

<a name="usage-thepeer-api-configuration"></a>

## Configuration File

The configuration file **loki_the_peer.php** is located in the **config** folder. Following are its contents when
published:

```php
return [
    'mode' => env('THE_PEER_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'public_key' => env('THE_PEER_TEST_PUBLIC_KEY', ''),
        'secret_key' => env('THE_PEER_TEST_SECRET_KEY', ''),
    ],
    'live' => [
        'public_key' => env('THE_PEER_LIVE_PUBLIC_KEY', ''),
        'secret_key' => env('THE_PEER_LIVE_SECRET_KEY', ''),
    ],

];
```

# Configuration Options

You can either use the env to set your keys or use your keys as shown in the example below:

````php
     $the_peer_service = new ThePeerClient($mode, $secret_key);
     
    For local testing, the "mode" is set to "sandbox", 
    
    $the_peer_service = new ThePeerClient('sandbox', 'secret-key');
    
    For Live testing, the "mode" is set to "live",
    
    $the_peer_service = new ThePeerClient('live', 'secret-key');
````

# Index User

```php
  $the_peer_service->indexUser(string $name, string $email, string $identifier);
```

## All Users

```php
$the_peer_service->allUsers(int $page = null, int $perPage = null);

```

## Update User

```php
$the_peer_service->updateUser(string $userReference, string $identifier);
```

## Delete User

```php
$the_peer_service->deleteUSer(string $userReference);
```

## Get User Link

```php
$the_peer_service->getUserLink(string $userReference);

```

## Get Transaction

```php
$the_peer_service->getTransaction(string $transactionId);
```

## Refund Transaction

```php
$the_peer_service->refundTransaction(string $transactionId, string $reason);
```

## Get Link

```php
$the_peer_service->getLink(string $linkId);
```

## Charge Link

```php
$the_peer_service->chargeLink(string $linkId, float $amount, string $remark);
```

## Test Credit

```php
$the_peer_service->testCredit(float $amount, string $currency, string $user_reference);
```

## Test Charge

```php
$the_peer_service->testCharge(float $amount, string $from, string $to, string $currency, string $remark, string $channel);
```