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
        $supportedTrackings = Arr::flatten($this->supportedWaybillByAccountType());
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
                'site_url' => 'https://www.posindonesia.co.id/',
                'shipping_cost_url' => 'https://www.posindonesia.co.id/check-tarif',
                'tracking_url' => 'https://www.posindonesia.co.id/tracking'
            ],
            [
                'code' => 'tiki',
                'description' => 'Citra Van Titipan Kilat (TIKI)',
                'site_url' => 'https://tiki.id/',
                'shipping_cost_url' => 'https://tiki.id/id/tariff',
                'tracking_url' => 'https://www.tiki.id/id/tracking'
            ],
            [
                'code' => 'rpx',
                'description' => 'RPX Holding (RPX)',
                'site_url' => 'https://www.rpx.co.id',
                'shipping_cost_url' => 'https://www.rpx.co.id/shipment-rate',
                'tracking_url' => 'https://www.rpx.co.id/tracking'
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
                'site_url' => 'http://www.pcpexpress.com',
                'shipping_cost_url' => 'http://www.pcpexpress.com/cek_ongkir.php',
                'tracking_url' => 'http://www.pcpexpress.com/lacak.php'
            ],
            [
                'code' => 'pandu',
                'description' => 'Pandu Logistics (PANDU)',
                'site_url' => 'https://pandulogistics.com/',
                'shipping_cost_url' => '',
                'tracking_url' => 'https://pandulogistics.com/id/track/'
            ],
            [
                'code' => 'wahana',
                'description' => 'Wahana Prestasi Logistik (WAHANA)',
                'site_url' => 'https://www.wahana.com/',
                'shipping_cost_url' => 'https://www.wahana.com/#cektarif',
                'tracking_url' => 'https://www.wahana.com/#lacakkiriman'
            ],
            [
                'code' => 'sicepat',
                'description' => 'SiCepat Express (SICEPAT)',
                'site_url' => 'https://www.sicepat.com/',
                'shipping_cost_url' => 'https://www.sicepat.com/deliveryFee',
                'tracking_url' => 'https://www.sicepat.com/checkAwb'
            ],
            [
                'code' => 'jnt',
                'description' => 'J&T Express (J&T)',
                'site_url' => 'https://jet.co.id/',
                'shipping_cost_url' => 'https://jet.co.id/rates',
                'tracking_url' => 'https://jet.co.id/track'
            ],
            [
                'code' => 'pahala',
                'description' => 'Pahala Kencana Express (PAHALA)',
                'site_url' => 'https://www.pahalaexpress.co.id/',
                'shipping_cost_url' => 'https://www.pahalaexpress.co.id/',
                'tracking_url' => 'https://www.pahalaexpress.co.id/'
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
                'site_url' => 'https://www.sap-express.id/',
                'shipping_cost_url' => 'https://www.sap-express.id/layanan/tarif',
                'tracking_url' => 'https://www.sap-express.id/layanan/tracking/track'
            ],
            [
                'code' => 'jet',
                'description' => 'JET Express (JET)',
                'site_url' => 'http://www.jetexpress.co.id/',
                'shipping_cost_url' => 'http://www.jetexpress.co.id/',
                'tracking_url' => 'http://www.jetexpress.co.id/'
            ],
            [
                'code' => 'indah',
                'description' => 'Indah Logistic (INDAH)',
                'site_url' => 'https://www.indahonline.com/',
                'shipping_cost_url' => 'https://www.indahonline.com/layanan/tarif',
                'tracking_url' => 'https://www.indahonline.com/layanan/cek_resi'
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
                'site_url' => 'https://www.expedito.co.id/',
                'shipping_cost_url' => 'https://www.expedito.co.id/',
                'tracking_url' => 'https://www.expedito.co.id/receipts/tracking',
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
                'site_url' => 'https://21express.co.id',
                'shipping_cost_url' => 'https://21express.co.id/tariff',
                'tracking_url' => 'https://21express.co.id/track'
            ],
            [
                'code' => 'ncs',
                'description' => 'Nusantara Card Semesta (NCS)',
                'site_url' => 'http://ncskurir.com/',
                'shipping_cost_url' => 'https://ncskurir.com/check-price/',
                'tracking_url' => 'https://ncskurir.com/tracking/'
            ],
            [
                'code' => 'star',
                'description' => 'Star Cargo (STAR)',
                'site_url' => 'https://starcargo.co.id/',
                'shipping_cost_url' => 'https://starcargo.co.id/prices',
                'tracking_url' => 'https://starcargo.co.id/tracking'
            ],
            [
                'code' => 'lion',
                'description' => 'Lion Parcel (LION)',
                'site_url' => 'https://lionparcel.com/',
                'shipping_cost_url' => 'https://lionparcel.com/',
                'tracking_url' => 'https://lionparcel.com/'
            ],
            [
                'code' => 'idl',
                'description' => 'IDL Cargo (IDL)',
                'site_url' => 'http://idlcargo.co.id/',
                'shipping_cost_url' => 'http://idlcargo.co.id/tarif',
                'tracking_url' => 'http://idlcargo.co.id/cek-paket'
            ],
            [
                'code' => 'rex',
                'description' => 'Royal Express Indonesia (REX)',
                'site_url' => 'https://rex.co.id/id',
                'shipping_cost_url' => 'https://www.rex.co.id/id/calculator',
                'tracking_url' => 'https://www.rex.co.id/id'
            ],
            [
                'code' => 'ide',
                'description' => 'ID Express (IDE)',
                'site_url' => 'https://idexpress.com/',
                'shipping_cost_url' => 'https://idexpress.com/',
                'tracking_url' => 'https://idexpress.com/Tracking1.jhtml'
            ],
            [
                'code' => 'sentral',
                'description' => 'Sentral Cargo (SENTRAL)',
                'site_url' => 'https://sentralcargo.co.id',
                'shipping_cost_url' => 'https://sentralcargo.co.id/ongkir',
                'tracking_url' => 'https://sentralcargo.co.id/cek-resi'
            ],
            [
                'code' => 'anteraja',
                'description' => 'AnterAja (ANTERAJA)',
                'site_url' => 'https://anteraja.id/',
                'shipping_cost_url' => 'https://anteraja.id/cek-ongkir',
                'tracking_url' => 'https://anteraja.id/tracking'
            ],
            [
                'code' => 'ninja',
                'description' => 'Ninja Xpress (NINJA)',
                'site_url' => 'https://www.ninjaxpress.co/id-id',
                'shipping_cost_url' => 'https://www.ninjaxpress.co/id-id#price-estimate',
                'tracking_url' => 'https://www.ninjaxpress.co/id-id/tracking'
            ],
        ])->map(function($courier) use($supportedTrackings){
            return array_merge($courier, [
                'international' => Arr::get($courier, 'international', false),
                'support_tracking' => in_array($courier['code'], $supportedTrackings)
            ]);
        });
    }

    /**
     * List supported couriers by account type
     *
     * @return array
     */
    public function supportedByAccountType()
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
    public function supportedWaybillByAccountType()
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
     * Get all code couriers
     *
     * @return array
     */
    public function getAllCodes()
    {
        return $this->couriers->pluck('code')->toArray();
    }

    /**
     * Get all courier as array (key & value)
     *
     * @return array
     */
    public function pluckAll()
    {
        return $this->couriers->pluck('description', 'code')->toArray();
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
     * Get supported couriers by account type (codes)
     *
     * @return array
     */
    public function getSupportedCodes()
    {
        return Arr::get($this->supportedByAccountType(), $this->accountType, 'starter');
    }

    /**
     * Get supported couriers by account type
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSupported()
    {
        return $this->couriers->whereIn('code', $this->getSupportedCodes())->values();
    }

    /**
     * Is supported courier by account type
     *
     * @param string $code. Courier code
     * @return bool
     */
    public function isSupported($code){
        return in_array($code, $this->getSupportedCodes());
    }

    /**
     * Get supported couriers for waybill by account type (codes)
     *
     * @return array
     */
    public function getSupportedWaybillCodes()
    {
        return Arr::get($this->supportedWaybillByAccountType(), $this->accountType, 'starter');
    }

    /**
     * Get supported couriers for way bill / tracking manifest
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSupportedWaybill()
    {
        return $this->couriers->whereIn('code', $this->getSupportedWaybillCodes())->values();
    }

    /**
     * Is supported couriers for way bill by account type
     *
     * @param string $code. Courier code
     * @return bool
     */
    public function isSupportedWaybill($code){
        return in_array($code, $this->getSupportedWaybillCodes());
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

    /**
     * Get support tracking courier
     *
     * @param bool $support.
     * @return \Illuminate\Support\Collection
     */
    public function getSupportedTrackings($support = true)
    {
        return $this->couriers->whereIn('support_tracking', $support)->values();
    }
}
