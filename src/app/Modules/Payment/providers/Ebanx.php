<?php

namespace App\Modules\Payment\providers;

use App\Modules\Payment\Interfaces\PaymentInterface;
use App\Modules\Payment\PaymentSystem;

class Ebanx extends PaymentSystem implements PaymentInterface {

    const NAME_PROVIDER = 'EBANX';

    public function getPaymentMethods(string $countryCode): array {
        $result = [];

        foreach ($this->getMethods($countryCode, self::NAME_PROVIDER) as $item) {
            array_push($result, [
                'name' => $item['name'],
                'comission' => $item['comission'],
                'image_url' => sprintf('ebanx_card_%s.jpg', $countryCode),
                'pay_url' => $item['pay_url']
            ]);
        }

        return $result;
    }
}
