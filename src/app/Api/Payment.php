<?php

namespace App\Api;

use App\Models\PaymentMethod;
use App\Models\PaymentSystem;

class Payment {

    public function isAvailable(string $paymentSystem): bool {
        return (bool)PaymentSystem::where('name', $paymentSystem)->firstOrFail()->is_available;
    }

    public function getPaymentMethods(string $paymentSystem) {
        return PaymentMethod::where('payment_system_id', PaymentSystem::where('name', $paymentSystem)->firstOrFail()->id)->get()->toArray();
    }
}
