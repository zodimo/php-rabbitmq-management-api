<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;

/**
 * Parameter
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Parameter extends AbstractApi
{
    /**
     * A list of all parameters.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/parameters');
    }

    /**
     * A list of all parameters for a given component and virtual host.
     *
     * @param  string      $component
     * @param  string|null $vhost
     * @param  string|null $name
     * @return array
     */
    public function get($component, $vhost = null, $name = null)
    {
        if ($vhost && $name) {
            return $this->client->send(
                uri_template(
                    '/api/parameters/{component}/{vhost}/{name}',
                    [
                        'component' => $component,
                        'vhost' => $vhost,
                        'name' => $name,
                    ]
                )
            );
        } elseif ($vhost) {
            return $this->client->send(
                uri_template('/api/parameters/{component}/{vhost}', ['component' => $component, 'vhost' => $vhost])
            );
        } else {
            return $this->client->send(uri_template('/api/parameters/{component}', ['component' => $component]));
        }
    }

    /**
     * To PUT a parameter, you will need a body looking something like this:
     *
     * {
     *     "vhost": "/",
     *     "component": "federation",
     *     "name": "local_username",
     *     "value": "guest"
     * }
     *
     * @param  string $component
     * @param  string $vhost
     * @param  string $name
     * @param  array  $parameter
     * @return array
     */
    public function create($component, $vhost, $name, array $parameter)
    {
        return $this->client->send(
            uri_template(
                '/api/parameters/{component}/{vhost}/{name}',
                [
                    'component' => $component,
                    'vhost' => $vhost,
                    'name' => $name,
                ]
            ),
            'PUT',
            null,
            $parameter
        );
    }

    /**
     * Delete a parameter
     *
     * @param  string $component
     * @param  string $vhost
     * @param  string $name
     * @return array
     */
    public function delete($component, $vhost, $name)
    {
        return $this->client->send(
            uri_template(
                '/api/parameters/{component}/{vhost}/{name}',
                [
                    'component' => $component,
                    'vhost' => $vhost,
                    'name' => $name,
                ]
            ),
            'DELETE'
        );
    }
}
