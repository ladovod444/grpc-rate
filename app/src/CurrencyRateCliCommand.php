<?php
// ./app/src/CurrencyRateCliCommand.php

declare(strict_types=1);

namespace App;

use GRPCContracts\Currency\CurrencyRateServiceInterface;
use GRPCContracts\Currency\GetRateRequest;
use Spiral\Console\Command;
use Spiral\RoadRunner\GRPC\Context;

final class CurrencyRateCliCommand extends Command
{
    // Сигнатура команды = имя команды + аргумент "ticker"
    public const SIGNATURE = 'grpc:get-currency-rate {ticker : Currency ticker}';
    public const DESCRIPTION = 'Get currency rate command';

    // Инжектим экземпляр клиента по интерфейсу
    public function __construct(
        private readonly CurrencyRateServiceInterface $currencyRateGrpcClient,
    ) {
        parent::__construct();
    }

    protected function perform(): int
    {
        // значение тикера берем из аргумента команды
        $ticker = $this->argument('ticker');

        // создаем запрос, помещаем в него тикер
        $request = new GetRateRequest();
        $request->setTicker($ticker);

        // вызываем gRPC метод клиента, получаем ответ от сервера
        $response = $this->currencyRateGrpcClient->GetRate(new Context([]), $request);

        // выводим результат на экран
        $this->output?->writeln("{$response->getTicker()}: {$response->getRate()}");

        return self::SUCCESS;
    }
}