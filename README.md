# Cyberfusion Core API client

Client for the [Cyberfusion Core API](https://core-api.cyberfusion.io/).

This client was built for and tested on the **1.239.0** version of the API.

## Support

This client is officially supported by Cyberfusion. If you have any questions, open an issue on GitHub or email
support@cyberfusion.nl.

The client was created by @dvdheiden and is built upon the [Saloon package](https://docs.saloon.dev/). Saloon provides a
lot of standard easy-to-use functionality but also the possibility to give you full control.

The **Enums, Models, Requests and Resources** are **automatically generated** based on the API spec.

## Requirements

This client requires PHP 8.1 or higher and uses [Guzzle](https://github.com/guzzle/guzzle) via the [Saloon package](https://docs.saloon.dev/). It also uses some Laravel components, but the Laravel framework is not required.

## Installation

This client can be used in any PHP project and with any framework.

Install the client with Composer:

`composer require cyberfusion/core-api-client`

## Usage

Refer to the [API documentation](https://core-api.cyberfusion.io/) for information about API requests. As the client is partially generated, the Enums, Models, Requests and Resources are completely in line with the Core API (documentation).

### Getting started

To get started, initialize the `CoreApiConnector` with your username and password. The connector will take care of authentication and offers several resources (i.e. `VirtualHosts`) and endpoints (i.e. `listVirtualHosts`) to get started. These are completely in line with the Core API (documentation).

```php
use Cyberfusion\CoreApi\CoreApiConnector;

$connector = new CoreApiConnector(
    username: 'username',
    password: 'password' 
);

$virtualHosts = $connector
    ->virtualHosts()
    ->listVirtualHosts()
    ->dtoOrFail();
```

### Authentication

The API is authenticated with a username and password and returns an access token. This client takes care of
authentication. When the authentication fails, it will throw the `AuthenticationException`. 

To get credentials, contact Cyberfusion.

### Requests

The client uses a fluent interface to build requests. The client uses DTOs to map the API responses to objects. To view
all possible requests, start with the connector, go to the desired resource and call the desired endpoint. All endpoints use 
parameters or DTOs to send data to the API.

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

#### Filtering/sorting data

Some endpoints support filtering and sorting data. You can use the `Filter` and `Sort` classes to build the desired
filter or sort. These do not validate if the provided fields exist in the API as the API also ignores those.

```php
use Cyberfusion\CoreApi\Support\Filter;

$connector
    ->virtualHosts()
    ->listVirtualHosts(
        filter: (new Filter())->add('unix_user_id', 1),
        sort: (new Sort())->add('name', 'asc')
    );
```

### Responses

The client uses DTOs to map the API responses to objects, but you have full access to the response. This means you can
implement the Core API in your own way when required, or just use the DTOs for the easiest way to get started.

#### Models

To retrieve the model, call the `dto()` method on the response. This will return a `CoreApiModel`, a Collection of models, a `ValidationError` model when validation failed or a `DetailMessage` model when something else failed.

```php
$virtualHosts = $connector
    ->virtualHosts()
    ->listVirtualHosts()
    ->dto();
```

There's also the possibility to throw an exception when the request fails. This is done by calling the `dtoOrFail()` method on the response. When the response doesn't have a `2xx` status code, it will throw a `LogicException`.

```php
$virtualHosts = $connector
    ->virtualHosts()
    ->listVirtualHosts()
    ->dtoOrFail();
```

#### Actual response

```php
$response = $connector
    ->virtualHosts()
    ->listVirtualHosts();

if ($response->failed()) {
    echo $response->status();
}
```

See the [Responses](https://docs.saloon.dev/the-basics/responses) documentation for more information.

### Models

The DTOs are validated before sending the request and will require all the required parameters. When invalid data is
provided a `ValidationException` will be thrown.

```php
use Cyberfusion\CoreApi\Models\MailAliasCreateRequest;
use Respect\Validation\Exceptions\ValidationException;

$mailAlias = new MailAliasCreateRequest(
    localPart: '&^@$#^&@$#^&',
    mailDomainId: 1
);
// throw ValidationException
```

The exception will provide more details about the validation errors.

### Enums

Some properties should contain certain values. These values can be found in the enum classes and are required by the models when the property is required.

### Exceptions

As you are fully in control, the client doesn't throw errors when a request fails. See the "Models" section for more information.

## Deep dive

### Middleware

There are several options to use middleware in the SDK. 

#### Custom middleware

The most common way is to use the `CoreApiConnector` and add middleware to it.

```php
use Cyberfusion\CoreApi\CoreApiConnector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Response;

$connector = new CoreApiConnector(
    .. // Initialize the connector
);

$connector
    ->middleware()
    ->onRequest(function (PendingRequest $pendingRequest) {
        // Do something with the request
    });
    
$connector
    ->middelware()    
    ->onResponse(function (Response $response) {
        // Do something with the response
    });
```

#### Guzzle Middleware

You can also add middleware to the Guzzle client directly. This is useful when you want to use Guzzle specific 
middleware.

```php
$connector
    ->sender()
    ->addMiddleware(
        // Add your Guzzle middleware
    );
```

For example when using the [request-response-log package](https://github.com/goedemiddag/request-response-log):

```php
use Goedemiddag\RequestResponseLog\RequestResponseLogger;

$connector
    ->sender()
    ->addMiddleware(
        RequestResponseLogger::middleware(Moneybird::VENDOR)
    );
```

### Manual requests

When you don't want to use the full SDK, but just easily send requests and retrieve response, you can use the 
`ManualRequest`. Just initialize the connector as usual and send a `ManualRequest` with the desired parameters:

```php
use Cyberfusion\CoreApi\CoreApiConnector;
use Cyberfusion\CoreApi\Support\ManualRequest;
use Saloon\Enums\Method;

$connector = new CoreApiConnector(
    .. // Initialize the connector
);
$response = $connector->send(new ManualRequest(
    url: '/api/v1/health',
    method: Method::GET, // optional: defaults to GET
    data: [], // optional: defaults to []
));
```

## Integrations

### Laravel

This client can be easily used in any Laravel application. Add your API credentials to the `.env` file:

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

Use those files to initialize the connector:

```php
use Cyberfusion\CoreApi\CoreApiConnector;

$connector = new CoreApiConnector(
    username: config('core-api.username'),
    password: config('core-api.password'),
);
```

## Tests

Unit tests are available in the `tests` directory. Run:

`composer test`

To generate a code coverage report in the `build/report` directory, run:

`composer test-coverage`

## Contribution

Contributions are welcome. See the [contributing guidelines](CONTRIBUTING.md). 

**Be aware: the Enums, Models, Requests and Resource are auto-generated. If something is wrong in those files, please 
create an issue instead of a pull request.**

## Security

If you discover any security related issues, please email support@cyberfusion.nl instead of using the issue tracker.

## License

This client is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
