<?php

declare(strict_types=1);

namespace GRPCContracts\Currency;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class CurrencyRateServiceClient implements CurrencyRateServiceInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function GetRate(ContextInterface $ctx, GetRateRequest $in): CurrencyRateResponse
    {
        [$response, $status] = $this->core->callAction(CurrencyRateServiceInterface::class, '/'.self::NAME.'/GetRate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPCContracts\Currency\CurrencyRateResponse::class,
        ]);

        return $response;
    }
}
