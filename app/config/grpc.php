<?php

declare(strict_types=1);

/**
 * Configuration for gRPC.
 *
 * @link https://spiral.dev/docs/grpc-configuration#configuration
 */
return [
    'binaryPath' => directory('root') . 'protoc-gen-php-grpc',
    'generatedPath' => directory('root') . '/generated',
    'namespace' => null, // тут ставим null
    'services' => [
        // сюда прописываем путь до нашего контракта сервиса
        directory('root') . '/proto/currency/service.proto'
    ],
    'servicesBasePath' => null, // тут ставим null
];
