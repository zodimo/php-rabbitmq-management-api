<?php

namespace Markup\RabbitMq\ManagementApi\Api;

class Definition extends AbstractApi
{

    /**
     * The server definitions - exchanges, queues, bindings, users, virtual hosts, permissions and parameters.
     *
     * Everything apart from messages. POST to upload an existing set of definitions. Note that:
     *
     * - The definitions are merged. Anything already existing is untouched.
     * - Conflicts will cause an error.
     * - In the event of an error you will be left with a part-applied set of definitions.
     *
     * For convenience you may upload a file from a browser to this URI (i.e. you can use multipart/form-data as well as
     * application/json) in which case the definitions should be uploaded as a form field named "file".
     *
     * @return mixed
     */
    public function get()
    {
        return $this->client->send(['/api/definitions']);
    }
}
