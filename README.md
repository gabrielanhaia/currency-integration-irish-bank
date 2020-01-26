# Integration with an Irish bank (example for transactions in Euro)

## Description

This is a package created by me for making transactions with an Irish bank. All transactions in Euro are processed by the Irish bank.

The files follow the same structure as [Integration Brazilian Bank](https://github.com/gabrielanhaia/currency-integration-brazilian-bank). The idea was to create a structure easy for al developers in a team to integrate with another platform/API quickly, easy to test, easy to extend and change the behavior and besides that, and using design patterns and object orientations.

## Structure of the files

`Integration`: In this folder are all files of the integration.

`Integration\Contract`: In this folder are the main interfaces of the project. In a real project, we should have another package as a main package in which we could centralize some interfaces.

`Integration\Entity`: These classes are representations of the objects sent or retrieved by the API. They are the only thing known by the project who is using it. We could say that it is an implementation of the famous DTO (Data transfer object).

`Integration\Exception`: Exceptions created specifically by this integration. They could be caught by who is using it.

`Integration\Factory`: This folder has all the factories to simplify the creation of the "parser", "formatter" and "requester". They are implementation of the Simple Factory, and they are really simple (with switches), however, I don't think it was necessary to implement the factory method, it would increase the complexity (with loads of classes) and I am sure that the number of the parsers, formatters, and requesters won't increase so much.

`Integration\Formatter`: The idea behind a formatter is to convert an object (Entity) to JSON, XML or whatever format you want. This object formatted will be sent by the API.

`Integration\Parser`: The idea behind a parser is almost the same as the formatters, however, the parsers are for converting the response of the API to Entities known by the client who uses these packages as a dependency.

`Integration\Requester`: Requesters are classes responsible for making the requests with the APIs, we should have one for each endpoint. They have an instance of the Guzzle Http, but this part would be improved (unfortunately I didn't have time for implementing it). I think the HTTP client should be in the main package of the integration (not implemented).

`Client`: This class works as a facade, it is through this class that the package is used. It is exactly as a Facade pattern, we call methods that group the parsers, formatters, and requesters.

`tests`: It's here all unit tests for this package. I think it is with a good coverage.

## How do i use it:

`composer require gabrielanhaia/currency-integration-irish-bank`

Note: It will not be necessary to do that, I had already added as a dependency.

## Notes

1. I had already develop a structure similar as that, but much bigger. This structure is working today in a Ecommerce that integrates with more than 200 different kinds of API's.
