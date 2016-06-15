<?php

namespace Markup\RabbitMq;

use Guzzle\Http\Client as GuzzleHttpClient;
use Markup\RabbitMq\ManagementApi\Api as Api;

/**
 * Factory class for API Endpoints.
 * Returns Api classes for use in fluent interface
 */
class Api
{
    /**
     * @var GuzzleHttpClient
     */
    private $client;

    /**
     * Api constructor.
     *
     * @param GuzzleHttpClient $client
     */
    public function __construct(GuzzleHttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Declares a test queue, then publishes and consumes a message. Intended for use by monitoring tools. If
     * everything is working correctly, will return HTTP status 200 with body:
     *
     * {"status":"ok"}
     *
     * Note: the test queue will not be deleted (to to prevent queue churn if this is repeatedly pinged).
     *
     * @param  string $vhost
     * @return array
     */
    public function alivenessTest($vhost)
    {
        return $this->client->send(['/api/aliveness-test/{vhost}', ['vhost' => $vhost]]);
    }

    /**
     * @return Api\Overview
     */
    public function overview()
    {
        return new Api\Overview($this);
    }

    /**
     * @return Api\Extension
     */
    public function extensions()
    {
        return new Api\Extension($this);
    }

    /**
     * @return Api\Definition
     */
    public function definitions()
    {
        return new Api\Definition($this);
    }

    /**
     * @return Api\Connection
     */
    public function connections()
    {
        return new Api\Connection($this);
    }

    /**
     * @return Api\Channel
     */
    public function channels()
    {
        return new Api\Channel($this);
    }

    /**
     * @return Api\Exchange
     */
    public function exchanges()
    {
        return new Api\Exchange($this);
    }

    /**
     * @return Api\Queue
     */
    public function queues()
    {
        return new Api\Queue($this);
    }

    /**
     * @return Api\Vhost
     */
    public function vhosts()
    {
        return new Api\Vhost($this);
    }

    /**
     * @return Api\Binding
     */
    public function bindings()
    {
        return new Api\Binding($this);
    }

    /**
     * @return Api\User
     */
    public function users()
    {
        return new Api\User($this);
    }

    /**
     * @return Api\Permission
     */
    public function permissions()
    {
        return new Api\Permission($this);
    }

    /**
     * @return Api\Parameter
     */
    public function parameters()
    {
        return new Api\Parameter($this);
    }

    /**
     * @return Api\Policy
     */
    public function policies()
    {
        return new Api\Policy($this);
    }

    /**
     * @return Api\WhoAmI
     */
    public function whoami()
    {
        return new Api\WhoAmI($this);
    }
}
