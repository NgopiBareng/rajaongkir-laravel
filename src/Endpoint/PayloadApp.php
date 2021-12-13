<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

trait PayloadApp {
    /**
     * Set payload android key to request
     *
     * @param string $key
     * @return self
     */
    public function setAndroidKey($key)
    {
        $this->addPayload([
            'android-key' => $key
        ]);
        return $this;
    }

    /**
     * Set payload ios key to request
     *
     * @param string $key
     * @return self
     */
    public function setIosKey($key)
    {
        $this->addPayload([
            'ios-key' => $key
        ]);
        return $this;
    }
}
