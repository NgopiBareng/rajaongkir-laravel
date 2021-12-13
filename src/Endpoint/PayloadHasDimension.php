<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

trait PayloadHasDimension {
    /**
     * @param int $length
     * @return self
     */
    public function length(int $length)
    {
        $this->addPayload([
            'length' => $length
        ]);
        return $this;
    }

    /**
     * @param int $width
     * @return self
     */
    public function width(int $width)
    {
        $this->addPayload([
            'width' => $width
        ]);
        return $this;
    }

    /**
     * @param int $height
     * @return self
     */
    public function height(int $height)
    {
        $this->addPayload([
            'height' => $height
        ]);
        return $this;
    }

    /**
     * @param int $length
     * @param int $width
     * @param int $height
     * @return self
     */
    public function setDimension(int $length, int $width, int $height)
    {
        $this->length($length);
        $this->width($width);
        $this->height($height);
        return $this;
    }
}
