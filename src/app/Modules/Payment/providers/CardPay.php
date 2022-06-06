<?php

namespace App\Modules\Payment\providers;

use App\Modules\Payment\Interfaces\PaymentInterface;
use App\Modules\Payment\PaymentSystem;

class CardPay extends PaymentSystem implements PaymentInterface {

    const NAME_PROVIDER = 'CardPay';

    public function getPaymentMethods(string $countryCode): array {

        return $this->getMethods($countryCode, self::NAME_PROVIDER);
    }
}
