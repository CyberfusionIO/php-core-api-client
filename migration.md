# Migration guide

## Migrate from v1

The migration from v1 to v2 is a big one, which contains a lot of breaking changes. The biggest change is that the package is now based on [Saloon](https://docs.saloon.dev/) and uses the Saloon response object. 

Cyberfusion has developed a process to automatically generate the Enums, Model, Requests and Responses from the API specification. This means that the package is now much more in line with the Core API and the requests are much easier to use and more reliable. 

### General

- The package is based on [Saloon](https://docs.saloon.dev/) to have a uniform and easy to use SDK. 
- All endpoints now return a `Response` object from the Saloon package, so you have the ability to view or use the response directly. To learn more about the response, see [Saloon Response](https://docs.saloon.dev/the-basics/responses).
- When requesting the DTO's from a request, those that are returning multiple objects are now returning [Collections](https://laravel.com/docs/11.x/collections) instead of plain arrays.
- All requests now require a DTO when data is provided. The DTO takes care of the required properties and validation. 

### Authentication

- The connector takes care of the authentication. The login request is available, but it is no longer possible to provide your custom access token as this client focuses on easy usage of the Core API and it is safer to not store the access token anyway.

### Enums

- All enums are now real PHP enums instead of classes with constants. This also means you should replace `::AVAILABLE` with the built-in `->cases()`.

### Models

- For the `allow_override_directives` and `allow_override_option_directives` the client was setting some sane default. This is no longer  the case as this package shouldn't be opinionated, so properly check those this fields.
- This package no longer uses its own validation to validate the provided values in the models, but uses the [Respect validation package](https://github.com/Respect/Validation). Accordingly, any validation errors now result in a `Respect\Validation\Exceptions\ValidationException` instead of a `Cyberfusion\ClusterApi\Exceptions\ValidationException`.

### Filtering/sorting

- The filter and sorter classes do no longer validate if the provided properties are actual properties of the model. This brings this client more in line with the Core API, as the API itself just ignores properties that are not filterable or sortable.
