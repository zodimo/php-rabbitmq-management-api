<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;

/**
 * Vhost
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Vhost extends AbstractApi
{
    /**
     * A list of all vhosts.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/vhosts');
    }

    /**
     * An individual virtual host.
     *
     * @param  string $name
     * @return array
     */
    public function get($name)
    {
        return $this->client->send(uri_template('/api/vhosts/{name}', ['name' => $name]));
    }

    /**
     * As a virtual host only has a name, you do not need an HTTP body when PUTing one of these.
     *
     * @param  string $name
     * @return array
     */
    public function create($name)
    {
        return $this->client->send(uri_template('/api/vhosts/{name}', ['name' => $name]), 'PUT');
    }

    /**
     * Delete a vhost.
     *
     * @param  string $name
     * @return array
     */
    public function delete($name)
    {
        return $this->client->send(uri_template('/api/vhosts/{name}', ['name' => $name]), 'DELETE');
    }

    /**
     * A list of all permissions for a given virtual host.
     *
     * @param  string $name
     * @return array
     */
    public function permissions($name)
    {
        return $this->client->send(uri_template('/api/vhosts/{name}/permissions', ['name' => $name]));
    }
}
