<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;

/**
 * Policy
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Policy extends AbstractApi
{
    /**
     * A list of all policies.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/policies');
    }

    /**
     * A list of all policies in a given virtual host.
     *
     * OR
     *
     * An individual policy.
     *
     * @param  string      $vhost
     * @param  string|null $name
     * @return array
     */
    public function get($vhost, $name = null)
    {
        if ($name) {
            return $this->client->send(uri_template('/api/policies/{vhost}/{name}', ['vhost' => $vhost, 'name' => $name]));
        }

        return $this->client->send(uri_template('/api/policies/{vhost}', ['vhost' => $vhost]));
    }

    /**
     * To PUT a policy, you will need a body looking something like this:
     *
     * {"pattern":"^amq.", "definition": {"federation-upstream-set":"all"}, "priority":0}
     *
     * @param  string $vhost
     * @param  string $name
     * @param  array  $policy
     * @return array
     */
    public function create($vhost, $name, array $policy)
    {
        return $this->client->send(
            uri_template(
                '/api/policies/{vhost}/{name}',
                [
                    'vhost' => $vhost,
                    'name' => $name,
                ]
            ),
            'PUT',
            null,
            $policy
        );
    }

    /**
     * Delete a policy
     *
     * @param  string $vhost
     * @param  string $name
     * @return array
     */
    public function delete($vhost, $name)
    {
        return $this->client->send(
            uri_template(
                '/api/policies/{vhost}/{name}',
                [
                    'vhost' => $vhost,
                    'name' => $name,
                ]
            ),
            'DELETE'
        );
    }
}
