<?php

namespace App\Modules\Payment\Interfaces;

interface PaymentInterface {

    public function getPaymentMethods(string $countryCode): array;
}
