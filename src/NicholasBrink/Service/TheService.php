<?php

namespace NicholasBrink\Service;

use Psr\Log\LoggerInterface;

class TheService implements TheServiceInterface
{
    /** @var  LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doubler(int $number): int
    {
        $this->logger->info("Doubling the number!", ['number' => $number]);
        return $number * 2;
    }
}
