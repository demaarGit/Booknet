<?php

namespace App\Modules\Payment;

use App\Modules\Payment\providers\ApplePay;
use App\Modules\Payment\providers\CardPay;
use App\Modules\Payment\providers\Ebanx;
use App\Modules\Payment\providers\GooglePay;
use App\Modules\Payment\providers\Interkassa;
use App\Modules\Payment\providers\PayPal;
use App\Modules\Payment\providers\Yandex;
use Illuminate\Container\Container;

class PaymentProvider {

    const SUPPORTED_PROVIDERS = [
        'Interkassa' => Interkassa::class,
        'Yandex.Kassa' => Yandex::class,
        'CardPay' => CardPay::class,
        'EBANX' => Ebanx::class,
        'PayPal' => PayPal::class,
        'GooglePay' => GooglePay::class,
        'ApplePay' => ApplePay::class,
    ];

    public function get(string $providerName) {
        if (empty(self::SUPPORTED_PROVIDERS[$providerName])) {
            throw new \Exception('Not found payment provider');
        }

        $container = Container::getInstance();
        return $container->make(self::SUPPORTED_PROVIDERS[$providerName]);
    }
}
