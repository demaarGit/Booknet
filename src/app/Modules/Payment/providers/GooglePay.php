<?php

namespace App\Modules\Payment\providers;

use App\Modules\Payment\Interfaces\PaymentInterface;
use App\Modules\Payment\PaymentSystem;

class GooglePay extends PaymentSystem implements PaymentInterface {

    const NAME_PROVIDER = 'GooglePay';

    public function getPaymentMethods(string $countryCode): array {

        return $countryCode === 'IN' ? [] : $this->getMethods($countryCode, self::NAME_PROVIDER);
    }

}
