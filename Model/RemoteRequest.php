<?php

/**
 * @copyright EveryWorkflow. All rights reserved.
 */

declare(strict_types=1);

namespace EveryWorkflow\RemoteBundle\Model;

use EveryWorkflow\CoreBundle\Model\DataObject;
use Symfony\Component\Uid\Uuid;

class RemoteRequest extends DataObject implements RemoteRequestInterface
{
    protected string $uri = 'http://example.com';
    protected string $method = 'get';

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->setDataIfNot(self::KEY_REQUEST_KEY, explode('-', Uuid::v4()->__toString())[0]);
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getRequestKey(): string
    {
        return $this->getData(self::KEY_REQUEST_KEY);
    }

    public function setRequestKey(string $requestKey): self
    {
        $this->setData(self::KEY_REQUEST_KEY, $requestKey);
        return $this;
    }
}
