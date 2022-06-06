<?php

namespace App\Modules\Payment;

use App\Api\Payment;

class PaymentSystem {

    private $api;

    public function __construct(Payment $api) {
        $this->api = $api;
    }

    public function getMethods(string $countryCode, string $paymentSystem): array {
        $result = [];

        if (!$this->isAvailable($paymentSystem)) {
            return $result;
        }

        foreach (Helper::sort($this->api->getPaymentMethods($paymentSystem), 'priority') as $key => $item) {
            $countries = explode(',', $item['countries']);
            if($item['allowed_countries_rule'] === 'allowed' && !in_array($countryCode, $countries)) {
                continue;
            }

            if($item['allowed_countries_rule'] === 'not_allowed' && in_array($countryCode, $countries)) {
                continue;
            }

            if(!$item['is_available']) {
                continue;
            }

            if ($countryCode === 'UA' && $item['name'] === 'Банковские карты') {
                array_push($result, [
                    'name' => $item['name'] . ' оплата картой ПриватБанка',
                    'comission' => $item['comission'],
                    'image_url' => 'privat_bank_cards.png',
                    'pay_url' => $item['pay_url']
                ]);
            }

            array_push($result, [
                'name' => $item['name'],
                'comission' => $item['comission'],
                'image_url' => $item['image_url'],
                'pay_url' => $item['pay_url']
            ]);
        }

        return $result;
    }

    private function isAvailable(string $paymentSystem): bool {
        return $this->api->isAvailable($paymentSystem);
    }
}
