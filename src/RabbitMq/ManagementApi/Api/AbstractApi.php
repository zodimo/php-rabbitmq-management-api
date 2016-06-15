<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use Markup\RabbitMq\ManagementApi\Client;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
