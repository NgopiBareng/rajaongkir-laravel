<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class RajaongkirResponse
{
    /** @var array */
    protected $response;

    public function __construct($response)
    {
        $this->setResponse($response);
    }

    public static function make($response)
    {
        $class = get_called_class();
        return (new $class($response));
    }

    /**
     * @param mixed $response
     * @return self
     */
    public function setResponse($response)
    {
        $this->response = Arr::get($response, 'rajaongkir');
        return $this;
    }

    /**
     * Get response
     *
     * @param string $group
     * @param string|null $key
     * @param mixed|null $response
     * @return string
     */
    protected function getResponse($group, $key = null, $response = null)
    {
        $keyStr = $group;
        $keyStr .= !is_null($key) ? '.' . $key : '';
        return Arr::get(!is_null($response) ? $response : $this->response, $keyStr);
    }

    /**
     * Get query
     *
     * @param string|null $key
     * @return string
     */
    public function getQuery($key = null)
    {
        return $this->getResponse('query', $key);
    }

    /**
     * Get status
     *
     * @param string|null $key
     * @return string
     */
    public function getStatus($key = null)
    {
        return $this->getResponse('status', $key);
    }

    /**
     * Get status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->getStatus('code');
    }

    /**
     * @return bool
     */
    public function failed()
    {
        return $this->getStatusCode() !== 200;
    }

    /**
     * @return bool
     */
    public function successfull()
    {
        return $this->getStatusCode() === 200;
    }

    /**
     * Get status description
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->getStatus('description');
    }

    /**
     * Response to array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }

    /**
     * Response to object
     *
     * @return array
     */
    public function toObject()
    {
        $json = json_encode($this->response, JSON_NUMERIC_CHECK);
        return json_decode($json);
    }

    /**
     * Response to collection
     *
     * @return Illuminate\Support\Collection
     */
    public function toCollection()
    {
        return Collection::make($this->toArray());
    }

    /**
     * Get response
     *
     * @return array
     */
    public function get()
    {
        return Arr::get($this->response, 'results');
    }

    /**
     * Get result response
     *
     * @return array
     */
    public function getResult()
    {
        return $this->get();
    }

    /**
     * Get first
     *
     * @return array
     */
    public function first()
    {
        return Arr::first($this->getResult());
    }
}
