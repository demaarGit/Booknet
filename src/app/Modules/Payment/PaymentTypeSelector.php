<?php

namespace App\Modules\Payment;

use Illuminate\Container\Container;

class PaymentTypeSelector {

    private $productType;
    private $amount;
    private $lang;
    private $countryCode;
    private $userOs;
    private $isYoomoneyDirectPayments;

    public function __construct(string $productType, float $amount, string $lang, string $countryCode, string $userOs) {
        $this->productType = $productType;
        $this->amount = $amount;
        $this->lang = $lang;
        $this->countryCode = $countryCode;
        $this->userOs = $userOs;
    }

    public function getAvailablePayments(): array {
        $result = [];
        $container = Container::getInstance();
        $paymentProvider = $container->make(PaymentProvider::class);
        $interkassa = $paymentProvider->get('Interkassa');
        $payPal = $paymentProvider->get('PayPal');
        $googlePay = $paymentProvider->get('GooglePay');
        $applePay = $paymentProvider->get('ApplePay');
        $cardPay = $paymentProvider->get('CardPay');
        $ebanx = $paymentProvider->get('EBANX');
        $yandex = $paymentProvider->get('Yandex.Kassa');

        if ($this->productType === 'reward' && $this->lang === 'ru' && $this->amount < 10) {
            return $result;
        }

        $result['Interkassa'] = $interkassa->getPaymentMethods($this->countryCode);
        $result['Yandex.Kassa'] = $yandex->getPaymentMethods($this->countryCode);
        $result['CardPay'] = $this->isYoomoneyDirectPayments ? [] : $cardPay->getPaymentMethods($this->countryCode);
        $result['EBANX'] = $ebanx->getPaymentMethods($this->countryCode);
        $result['PayPal'] = $this->lang === 'ru' && $this->amount < 30 ? [] : $payPal->getPaymentMethods($this->countryCode);

        if ($this->userOs === 'android') {
            $result['GooglePay'] = $googlePay->getPaymentMethods($this->countryCode);
        }

        if ($this->userOs === 'ios') {
            $result['ApplePay'] = $applePay->getPaymentMethods($this->countryCode);
        }

        return $result;
    }

    public function enableYoomoneyDirectPayments() {
        $this->isYoomoneyDirectPayments = true;
    }
}
