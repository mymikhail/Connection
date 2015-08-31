<?php

namespace Imhonet\Connection\Resource;

use Elasticsearch\ClientBuilder;

class Elastic implements IResource
{
    /**
     * @var \Elasticsearch\Client
     */
    private $resource;

    private $host;
    private $port;
    private $index;
    private $type;

    /**
     * @inheritdoc
     */
    public function getHandle()
    {
        if (!$this->resource) {
            $this->resource = ClientBuilder::create()
                ->setHosts([$this->host . ($this->port ? ':' . $this->port : null)])
                ->build();
        }

        return $this->resource;
    }

    /**
     * @inheritdoc
     */
    public function disconnect()
    {
        $this->resource = null;
    }

    /**
     * @inheritdoc
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function setUser($user)
    {
        return $this;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function setPassword($password)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setDatabase($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function setTable($table)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setIndexName($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function setIndexFields(array $fields)
    {
        return $this;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function setIds($ids)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @inheritdoc
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function getUser()
    {
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function getPassword()
    {
    }

    /**
     * @inheritdoc
     */
    public function getDatabase()
    {
        return $this->index;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function getTable()
    {
    }

    /**
     * @inheritdoc
     */
    public function getIndexName()
    {
        return $this->type;
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function getIndexFields()
    {
        //
    }

    /**
     * @deprecated
     * @inheritdoc
     */
    public function getIds()
    {
    }
}
