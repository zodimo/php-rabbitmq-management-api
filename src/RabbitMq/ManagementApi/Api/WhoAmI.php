<?php

namespace Markup\RabbitMq\ManagementApi\Api;

class WhoAmI extends AbstractApi
{

    /**
     * @return array
     */
    public function get()
    {
        return $this->client->send('/api/whoami');
    }
}
