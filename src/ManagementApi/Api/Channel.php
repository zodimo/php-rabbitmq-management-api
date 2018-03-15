<?php

namespace Markup\RabbitMq\ManagementApi\Api;

use GuzzleHttp\uri_template;

/**
 * Channel
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Channel extends AbstractApi
{
    /**
     * A list of all open channels.
     *
     * @return array
     */
    public function all()
    {
        return $this->client->send('/api/channels');
    }

    /**
     * Details about an individual channel.
     *
     * @param  string $channel
     * @return array
     */
    public function get($channel)
    {
        return $this->client->send(uri_template('/api/channels/{channel}', ['channel' => $channel]));
    }
}
