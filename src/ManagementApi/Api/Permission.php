<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;
use Markup\RabbitMq\ManagementApi\Exception\InvalidArgumentException;

/**
 * Permission
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Permission extends AbstractApi
{
    /**
     * A list of all permissions for all users.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/permissions');
    }

    /**
     * An individual permission of a user and virtual host.
     *
     * @param  string $vhost
     * @param  string $user
     * @return array
     */
    public function get($vhost, $user)
    {
        return $this->client->send(uri_template('/api/permissions/{vhost}/{user}', ['vhost' => $vhost, 'user' => $user]));
    }

    /**
     * To PUT a permission, you will need a body looking something like this:
     *
     * {"configure":".*","write":".*","read":".*"}
     *
     * All keys are mandatory.
     *
     * @param  string                   $vhost
     * @param  string                   $user
     * @param  array                    $permission
     * @return array
     * @throws InvalidArgumentException
     */
    public function create($vhost, $user, array $permission)
    {
        if (!isset($permission['configure']) || !isset($permission['write']) || !isset($permission['read'])) {
            throw new InvalidArgumentException("Error creating permission: 'configure', 'write', and 'read' permissions must be properly set.");
        }

        return $this->client->send(
            uri_template(
                '/api/permissions/{vhost}/{user}',
                [
                    'vhost' => $vhost,
                    'user' => $user,
                ]
            ),
            'PUT',
            null,
            $permission
        );
    }

    /**
     * Delete a specific set of permissions
     *
     * @param  string $vhost
     * @param  string $user
     * @return array
     */
    public function delete($vhost, $user)
    {
        return $this->client->send(
            uri_template(
                '/api/permissions/{vhost}/{user}',
                [
                    'vhost' => $vhost,
                    'user' => $user,
                ]
            ),
            'DELETE'
        );
    }
}
