<?php

use function DI\factory;
use function DI\object;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use NicholasBrink\Service\TheService;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return [
    'Logger' => factory(function () {
        $logger = new Logger('mylog');
        $fileHandler = new StreamHandler('../logs/mylog.log', Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);
        return $logger;
    }),
    LoggerInterface::class => function (ContainerInterface $c) {
        return $c->get('Logger');
    },
    'TheService' => object(TheService::class)
];