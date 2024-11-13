<?php
// ./app/src/CurrencyRateService.php

declare(strict_types=1);

namespace App;

use GRPCContracts\Currency\CurrencyRateResponse;
use GRPCContracts\Currency\CurrencyRateServiceInterface;
use GRPCContracts\Currency\GetRateRequest;
use Spiral\RoadRunner\GRPC;

final class CurrencyRateService implements CurrencyRateServiceInterface
{
    public function GetRate(GRPC\ContextInterface $ctx, GetRateRequest $in): CurrencyRateResponse
    {
        $response = new CurrencyRateResponse();

        $rate = \random_int(70, 75) . '.00';

        $response->setRate($rate);

        $response->setTicker($in->getTicker());

        return $response;
    }
}
