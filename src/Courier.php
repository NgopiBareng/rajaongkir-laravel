<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

/**
 * List supported couriers in raja ongkir
 * @see https://rajaongkir.com/dokumentasi#daftar-kurir
 */
class Courier
{
    /** @var \Illuminate\Support\Collection */
    protected $couriers;

    /** @var string */
    protected $accountType;

    /**
     * @param string|null $accountType
     * @return void
     */
    public function __construct($accountType = null)
    {
        $this->setCouriers($accountType);
        $this->setAccountType($accountType);
    }

    /**
     * @param string|null $accountType
     * @return self
     */
    public static function make($accountType = null)
    {
        $class = get_called_class();
        return (new $class($accountType));
    }

    /**
     * List all couriers
     *
     * @return \Illuminate\Support\Collection
     */
    private function setCouriers()
    {
        $this->couriers = Collection::make([
            [
                'code' => 'jne',
                'description' => 'Jalur Nugraha Ekakurir (JNE)',
                'site_url' => 'https://www.jne.co.id/',
                'shipping_cost_url' => 'https://www.jne.co.id/id/tracking/tarif',
                'tracking_url' => 'https://www.jne.co.id/id/tracking/trace'
            ],
            [
                'code' => 'pos',
                'description' => 'POS Indonesia (POS)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'tiki',
                'description' => 'Citra Van Titipan Kilat (TIKI)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'rpx',
                'description' => 'RPX Holding (RPX)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'esl',
                'description' => 'Eka Sari Lorena (ESL)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'pcp',
                'description' => 'Priority Cargo and Package (PCP)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'pandu',
                'description' => 'Pandu Logistics (PANDU)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'wahana',
                'description' => 'Wahana Prestasi Logistik (WAHANA)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'sicepat',
                'description' => 'SiCepat Express (SICEPAT)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'jnt',
                'description' => 'J&T Express (J&T)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'pahala',
                'description' => 'Pahala Kencana Express (PAHALA)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'cahaya',
                'description' => 'Cahaya Logistik (CAHAYA)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'sap',
                'description' => 'SAP Express (SAP)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'jet',
                'description' => 'JET Express (JET)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'indah',
                'description' => 'Indah Logistic (INDAH)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'slis',
                'description' => 'Solusi Express (SLIS)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'expedito',
                'description' => 'Expedito',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => '',
                'international' => true
            ],
            [
                'code' => 'dse',
                'description' => '21 Express (DSE)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'first',
                'description' => 'First Logistics (FIRST)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'ncs',
                'description' => 'Nusantara Card Semesta (NCS)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'star',
                'description' => 'Star Cargo (STAR)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'lion',
                'description' => 'Lion Parcel (LION)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'idl',
                'description' => 'IDL Cargo (IDL)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'rex',
                'description' => 'Royal Express Indonesia (REX)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'ide',
                'description' => 'ID Express (IDE)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'sentral',
                'description' => 'Sentral Cargo (SENTRAL)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ],
            [
                'code' => 'anteraja',
                'description' => 'AnterAja (ANTERAJA)',
                'site_url' => '',
                'shipping_cost_url' => 'https://anteraja.id/cek-ongkir',
                'tracking_url' => 'https://anteraja.id/tracking'
            ],
            [
                'code' => 'ninja',
                'description' => 'Ninja Xpress (NINJA)',
                'site_url' => '',
                'shipping_cost_url' => '',
                'tracking_url' => ''
            ]
        ]);
    }

    /**
     * List supported couriers by account type
     *
     * @return array
     */
    private function supportedByAccountType()
    {
        return [
            'starter' => [
                'jne',
                'pos',
                'tiki',
            ],
            'basic' => [
                'jne',
                'pos',
                'tiki',
                'pcp',
                'esl',
                'rpx',
            ],
            'pro' => [
                'jne',
                'pos',
                'tiki',
                'rpx',
                'pandu',
                'wahana',
                'sicepat',
                'jnt',
                'pahala',
                'sap',
                'jet',
                'indah',
                'dse',
                'slis',
                'first',
                'ncs',
                'star',
                'ninja',
                'lion',
                'idl',
                'rex',
                'ide',
                'sentral'
            ]
        ];
    }

    /**
     * List supported couriers for waybill by account type
     *
     * @return array
     */
    private function supportedWaybillByAccountType()
    {
        return [
            'starter' => [],
            'basic' => [
                'jne',
            ],
            'pro' => [
                'jne',
                'pos',
                'tiki',
                'pcp',
                'rpx',
                'wahana',
                'sicepat',
                'j&t',
                'sap',
                'jet',
                'dse',
                'first',
            ],
        ];
    }

    /**
     * Set Account type
     *
     * @param string $accountType
     * @return self
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
        return $this;
    }

    /**
     * Get all couriers
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->couriers;
    }

    /**
     * Get supported couriers by account type
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSupported()
    {
        $codes = Arr::get($this->supportedByAccountType(), $this->accountType, 'starter');
        return $this->couriers->whereIn('code', $codes)->values();
    }

    /**
     * Get supported couriers for way bill / tracking manifest
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSupportedWaybill()
    {
        $codes = Arr::get($this->supportedWaybillByAccountType(), $this->accountType, 'starter');
        return $this->couriers->whereIn('code', $codes)->values();
    }

    /**
     * Get international couriers
     *
     * @return \Illuminate\Support\Collection
     */
    public function getInternationalCouriers()
    {
        return $this->couriers->whereIn('international', true)->values();
    }

    /**
     * Get domestic couriers
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDomesticCouriers()
    {
        return $this->couriers->whereIn('international', false)->values();
    }
}
