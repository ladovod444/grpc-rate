<?php

declare(strict_types=1);

namespace App\Application\Config;

use Grpc\ChannelCredentials;
use Spiral\Core\InjectableConfig;

class GRPCServicesConfig extends InjectableConfig
{
    public const CONFIG = 'grpcServices';

    /** @var array<class-string, array{host: string, credentials?: mixed}> */
    protected array $config = ['services' => [], 'interceptors' => []];

    public function getDefaultCredentials(): mixed
    {
        return ChannelCredentials::createInsecure();
    }

    public function getInterceptors(): array
    {
        return $this->config['interceptors'];
    }

    /**
     * Get service definition.
     * @return array{host: string, credentials?: mixed}
     */
    public function getService(string $name): array
    {
        return $this->config['services'][$name] ?? [
            'host' => 'localhost'
        ];
    }
}
