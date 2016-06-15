<?php

namespace Markup\RabbitMq\ManagementApi\Api;

class Extension extends AbstractApi
{

    /**
     * A list of extensions to the management plugin.
     *
     * @return array
     */
    public function get()
    {
        return $this->client->send('/api/extensions');
    }
}
