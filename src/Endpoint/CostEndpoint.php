<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasDimension;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;

class CostEndpoint extends BaseEndpoint
{
    use PayloadHasDimension;
    use PayloadHasCourier;

    protected $cacheName = 'cost';
    protected $endpoint = 'cost';
    protected $disableCache = true;

    /**
     * @param string $origin
     * @return self
     */
    public function origin($origin)
    {
        $this->addPayload([
            'origin' => $origin
        ]);
        return $this;
    }

    /**
     * @param string $originType
     * @return self
     */
    public function originType($originType)
    {
        $this->addPayload([
            'originType' => $originType
        ]);
        return $this;
    }

    /**
     * @param string $origin
     * @param string $originType
     * @return self
     */
    public function setOrigin($origin, $originType)
    {
        $this->origin($origin);
        $this->originType($originType);
        return $this;
    }

    /**
     * @param string $origin
     * @return self
     */
    public function setCityOrigin($origin)
    {
        $this->setOrigin($origin, 'city');
        return $this;
    }

    /**
     * @param string $origin
     * @return self
     */
    public function setDistrictOrigin($origin)
    {
        $this->setOrigin($origin, 'subdistrict');
        return $this;
    }

    /**
     * @param string $destination
     * @return self
     */
    public function destination($destination)
    {
        $this->addPayload([
            'destination' => $destination
        ]);
        return $this;
    }

    /**
     * @param string $destinationType
     * @return self
     */
    public function destinationType($destinationType)
    {
        $this->addPayload([
            'destinationType' => $destinationType
        ]);
        return $this;
    }

    /**
     * @param string $destination
     * @param string $destinationType
     * @return self
     */
    public function setDestination($destination, $destinationType)
    {
        $this->destination($destination);
        $this->destinationType($destinationType);
        return $this;
    }

    /**
     * @param string $destination
     * @return self
     */
    public function setCityDestination($destination)
    {
        $this->setDestination($destination, 'city');
        return $this;
    }

    /**
     * @param string $destination
     * @return self
     */
    public function setDistrictDestination($destination)
    {
        $this->setDestination($destination, 'subdistrict');
        return $this;
    }

    /**
     * @param int $weight
     * @return self
     */
    public function weight(int $weight)
    {
        $this->addPayload([
            'weight' => $weight
        ]);
        return $this;
    }

    /**
     * @param int $diameter
     * @return self
     */
    public function diameter(int $diameter)
    {
        $this->addPayload([
            'diameter' => $diameter
        ]);
        return $this;
    }

    /**
     * @param array $payloads
     */
    public function get($payloads = [])
    {
        $this->addPayload($payloads);
        return $this->makeRequest('POST');
    }
}
