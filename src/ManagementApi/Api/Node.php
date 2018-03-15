<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;

/**
 * Nodes
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Node extends AbstractApi
{
    /**
     * A list of nodes in the RabbitMQ cluster.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/nodes');
    }

    /**
     * An individual node in the RabbitMQ cluster. Add "?memory=true" to get memory statistics.
     *
     * @param  string $name
     * @param  bool   $memory
     * @return array
     */
    public function get($name, $memory = false)
    {
        return $this->client->send(uri_template('/api/nodes/{name}{?memory}', ['name' => $name, 'memory' => $memory]));
    }
}
