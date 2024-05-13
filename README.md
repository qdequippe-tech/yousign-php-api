# PHP client for Yousign API

This SDK is generated automatically with [JanePHP](https://github.com/janephp/janephp)
from the [Yousign API](https://developers.yousign.com/).

It also provides a **full object-oriented interface** for all the endpoints,
requests and responses of the Yousign API.

## Installation

This library is built atop of [PSR-7](https://www.php-fig.org/psr/psr-7/) and
[PSR-18](https://www.php-fig.org/psr/psr-18/). So you will need to install some
implementations for those standard interfaces.

If no PSR-18 client or PSR-7 message factory is available yet in your project
or you don't know or don't care which one to use, just install some default:

```bash
composer require symfony/http-client nyholm/psr7
```

You can now install the Yousign client:

```bash
composer require qdequippe/yousign-php-api
```

## Quick start

To create a client:

```php
$client = \Qdequippe\Yousign\Api\Client::create();
$client->getSignatureRequests();
```