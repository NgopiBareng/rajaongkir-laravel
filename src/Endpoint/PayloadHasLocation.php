<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

trait PayloadHasLocation {
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
}
