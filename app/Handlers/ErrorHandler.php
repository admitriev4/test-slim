<?php
/**
 * @var $app object
 */


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;



return function (
    ServerRequestInterface $request,
    Throwable $exception,
) use ($app): Response {
    $statusCode = 500;
    if (is_int($exception->getCode()) &&
        $exception->getCode() >= 400 &&
        $exception->getCode() <= 500
    ) {
        $statusCode = $exception->getCode();
    }
    $className = new \ReflectionClass($exception::class);
    $data = [
        'message' => $exception->getMessage(),
        'class' => $className->getShortName(),
        'status' => 'error',
        'code' => $statusCode,
    ];
    $body = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write($body);

    return $response
        ->withStatus($statusCode)
        ->withHeader('Content-type', 'application/problem+json');
};