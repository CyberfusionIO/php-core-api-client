# Cyberfusion Core PHP API client

PHP client for the [Cyberfusion Core API](https://core-api.cyberfusion.io/).

This client was built for and tested on the **1.255.0** version of the API.

## Support

This client is officially supported by Cyberfusion.

Have questions? Ask your support questions on the [platform](https://platform.cyberfusion.io/). No access to the platform? Send an email to [support@cyberfusion.io](mailto:support@cyberfusion.io). **GitHub issues are not actively monitored.**

## Author

This client was developed and is actively maintained by [@dvdheiden](https://github.com/dvdheiden).

The client is built upon the [Saloon package](https://docs.saloon.dev/).
Saloon provides easy-to-use functionality (sane defaults), _and_ full control (configurability).

# Install

This client can be used in any PHP project and with any framework.

This client requires PHP 8.1 or higher. It uses [Guzzle](https://github.com/guzzle/guzzle) via the [Saloon package](https://docs.saloon.dev/). The client uses specific Laravel components, but the Laravel framework is not required.

## Composer

    composer require cyberfusion/core-api-client

# Usage

## API documentation

Refer to the [API documentation](https://core-api.cyberfusion.io/) for information about API requests.

**Enums, Models, Requests and Resources** are **auto-generated** based on the OpenAPI spec - so the client is completely in line with the Core API.

## Getting started

Initialise the `CoreApiConnector` with your username and password.

The connector takes care of authentication, pagination and offers several resources (e.g. `VirtualHosts`) and 
endpoints (e.g. `listVirtualHosts`).

```php
use Cyberfusion\CoreApi\CoreApiConnector;

$connector = new CoreApiConnector(
    username: 'username',
    password: 'password' 
);

// Multiple resources, will take care of pagination for you
foreach ($connector->virtualHosts()->listVirtualHosts()->items() as $virtualHost) {
    echo $virtualHost->getDomain();
}

// Single resource
$virtualHost = $connector
    ->virtualHosts()
    ->readVirtualHost(1)
    ->dto();
```

## Authentication

Authenticate with the Core API using a username and password. This client takes care of authentication.

If authentication fails, `AuthenticationException` is thrown. 

Don't have an API user? Contact Cyberfusion.

## Requests

The client uses a fluent interface to build requests.

- Start with the connector
- Go to the desired resource
- Call the desired endpoint

Code example:

```php
use Cyberfusion\CoreApi\CoreApiConnector;
use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;

$connector = new CoreApiConnector(
    username: 'username',
    password: 'password' 
);

$mailDomainResource = $connector
    ->mailDomains()
    ->createMailDomain(new MailDomainCreateRequest(
        domain: 'cyberfusion.io',
        unixUserId: 1,
        isLocal: true,
    ))
    ->dto();
```

DTOs are validated before sending the request. If invalid data is provided, `ValidationException` is thrown.

Code example:

```php
use Cyberfusion\CoreApi\Models\MailAliasCreateRequest;
use Respect\Validation\Exceptions\ValidationException;

$mailAlias = new MailAliasCreateRequest(
    localPart: '&^@$#^&@$#^&',
    mailDomainId: 1
);
// throw ValidationException
```

The exception contains `ValidationError` objects in the errors collection.

Coe example:

```php
try {
    $virtualHost = $connector
        ->virtualHosts()
        ->createVirtualHost(...)
        ->dto();
} catch (RequestFailedException $exception) {
    echo $exception->getDetailMessage()->getDetail();
} catch (ValidationException $exception) {
    foreach ($exception->errors() as $error) {
        echo $error->getMsg();
    }
}
```

## Responses

API responses are mapped to DTOs: all endpoints use parameters or DTOs to send data to the API.

### Get single model from response

To retrieve a model, call `dto()` on the response. This either returns:

- `Collection` of `CoreApiModel` instances
- `CoreApiModel`

Code example:

```php
$virtualHost = $connector
    ->virtualHosts()
    ->readVirtualHost(1)
    ->dto();
```

### List multiple models from response

This package handles the pagination for you, so you can easily list over all results. To retrieve multiple models, call 
`items()` on the response. This returns a `Collection` of `CoreApiModel` instances.

Code example:

```php
foreach ($connector->virtualHosts()->listVirtualHosts()->items() as $virtualHost) {
    echo $virtualHost->getDomain();
}
```

This will keep requesting new pages from the Core API until all items are retrieved.

### Throw exception on failure

If a request returns an unexpected HTTP status code, `RequestFailedException` is thrown.

The exception includes the response, and - if returned - a `DetailMessage` object with more information.

### Get literal response

For advanced usage, you have full access to the literal response.

Code example:

```php
$response = $connector
    ->virtualHosts()
    ->listVirtualHosts();

if ($response->failed()) {
    echo $response->status();
}
```

See the [Responses](https://docs.saloon.dev/the-basics/responses) documentation for more information.

## Filtering data

Most endpoints support filtering the data. The endpoint that support filtering could be provided their own search models so you can easily determine on which fields filtering is possible. This prevents you from having to look up the fields in the documentation or using fields that are not supported.

Code example:

```php
use Cyberfusion\CoreApi\Models\MailAliasesSearchRequest;

$filter = new MailAliasesSearchRequest();
$filter->setLocalPart('info');

$connector
    ->mailAliases()
    ->listMailAliases($filter); // returns all mail aliases with 'info' as the local part
```

## Includes

The Core API supports including related resources in the response. This prevents you from having to make multiple requests to retrieve related data.

Code example:

```php
$connector
    ->mailAliases()
    ->listMailAliases(
        includes: ['mail_domain']
    ); // returns all mail aliases including their related mail domain
```

## Enums

Some properties only accept certain values (enums).

Find these values in the enum classes.

## Deep dive

### Middleware

There are several options to use middleware in the SDK. 

#### Custom middleware

The most common approach: add middleware to `CoreApiConnector`.

```php
use Cyberfusion\CoreApi\CoreApiConnector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Response;

$connector = new CoreApiConnector(
    .. // Initialise the connector
);

$connector
    ->middleware()
    ->onRequest(function (PendingRequest $pendingRequest) {
        // Do something with the request
    });
    
$connector
    ->middleware()    
    ->onResponse(function (Response $response) {
        // Do something with the response
    });
```

#### Guzzle Middleware

You can add middleware to the Guzzle client directly. This is useful when you want to use Guzzle-specific middleware.

```php
$connector
    ->sender()
    ->addMiddleware(
        // Add your Guzzle middleware
    );
```

Code example, when using the [request-response-log package](https://github.com/goedemiddag/request-response-log):

```php
use Goedemiddag\RequestResponseLog\RequestResponseLogger;

$connector
    ->sender()
    ->addMiddleware(
        RequestResponseLogger::middleware(Moneybird::VENDOR)
    );
```

### Manual requests

Don't want to use the full SDK, but easily send requests and retrieve responses from the Core API?

Use `ManualRequest`. Initialise the connector as usual, and send `ManualRequest` with the desired parameters:

```php
use Cyberfusion\CoreApi\CoreApiConnector;
use Cyberfusion\CoreApi\Support\ManualRequest;
use Saloon\Enums\Method;

$connector = new CoreApiConnector(
    .. // Initialise the connector
);
$response = $connector->send(new ManualRequest(
    url: '/api/v1/health',
    method: Method::GET, // optional: defaults to GET
    data: [], // optional: defaults to []
));
```

## Integrations

### Laravel

This client can be easily used in any Laravel application.

Add your API credentials to the `.env` file:

```
CORE_API_USERNAME=username
CORE_API_PASSWORD=password
```

Next, create a config file called `core-api.php` in the `config` directory:

```php
<?php

return [
    'username' => env('CORE_API_USERNAME'),
    'password' => env('CORE_API_PASSWORD'),
];
```

Use those files to initialise the connector:

```php
use Cyberfusion\CoreApi\CoreApiConnector;

$connector = new CoreApiConnector(
    username: config('core-api.username'),
    password: config('core-api.password'),
);
```

## Helpers

The client provides several helper functions to make working with the Core API easier and to help you implement in the 
Core API in your application. 

### Certificates

In case of Certificates, the Core API requires the certificates and private key in a specific format. The client 
provides a helper to convert those to the required format.

```php
use Cyberfusion\CoreApi\Support\CertificateHelper;

$rawCertificate = file_get_contents('/path/to/certificate.crt');

$formattedCertificate = CertificateHelper::format($rawCertificate);
```

The formatted certificates can be used directly in your request to the Core API:

```php
use Cyberfusion\CoreApi\Support\CertificateHelper;

$connector
    ->certificates()
    ->createCertificate(new CertificateCreateRequest(
        certificate: CertificateHelper::format($rawCertificate),
        caChain: CertificateHelper::format($rawCaChain),
        privateKey: CertificateHelper::format($rawPrivateKey),
        clusterId: 1,
    ));
```

It also offers some basic functionality to validate the certificate and private key structure:

```php
use Cyberfusion\CoreApi\Support\CertificateHelper;

$isValid = CertificateHelper::isValid('-----BEGIN CERTIFICATE----- ... -----END CERTIFICATE-----');
```

# Tests

Unit tests are available in the `tests` directory. Run:

    composer test

To generate a code coverage report in the `build/report` directory, run:

    composer test-coverage
