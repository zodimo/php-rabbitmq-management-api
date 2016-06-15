<?php

namespace Markup\RabbitMq\ManagementApi\Api;

class Overview extends AbstractApi
{
    /**
     * Various random bits of information that describe the whole system.
     *
     * @return array
     */
    public function get()
    {
        return $this->client->send('/api/overview');
    }
}
