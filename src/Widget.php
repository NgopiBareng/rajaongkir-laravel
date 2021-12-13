<?php

namespace Ngopibareng\RajaongkirLaravel;

/**
 * Widget raja ongkir
 * @see https://rajaongkir.com/widget
 */
class Widget
{
    protected $id = 'rajaongkir-widget';
    protected $jsUrl = 'https://rajaongkir.com/script/widget.js';

    public function __construct()
    {
    }

    public static function make()
    {
        $class = get_called_class();
        return (new $class());
    }

    /**
     * @param string $id
     * @return self
     */
    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $url
     * @return self
     */
    public function jsUrl($url)
    {
        $this->jsUrl = $url;
        return $this;
    }

    /**
     * @param string $theme
     * @return string
     */
    public function build($theme = 'light')
    {
        return "<div data-theme='" . $theme . "' id='" . $this->id ."'></div>
        <script type=\"text/javascript\" src='" . $this->jsUrl ."'></script>";
    }
}
