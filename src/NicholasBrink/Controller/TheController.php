<?php

namespace NicholasBrink\Controller;

use NicholasBrink\Service\TheServiceInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class TheController
{
    /** @var LoggerInterface */
    private $logger;

    /** @var TheServiceInterface */
    private $service;

    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container->get('Logger');
        $this->service = $container->get('TheService');
    }

    public function doStuff(): int
    {
        $this->logger->info("Logging in the container!");
        return $this->service->doubler(10);
    }
}