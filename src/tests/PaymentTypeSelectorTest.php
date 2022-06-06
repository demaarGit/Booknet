<?php

use App\Modules\Payment\PaymentTypeSelector;

class PaymentTypeSelectorTest extends TestCase {

    /** @test */
    public function getAvailablePaymentsTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 40, 'ru', 'en', 'windows');

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[{"name":"Visa \/ MasterCard","comission":1,"image_url":"CardPay_VISA_MasterCard.jpg","pay_url":"\/pay\/CardPay\/VISA_MasterCard"}],"EBANX":[],"PayPal":[{"name":"PayPal","comission":1,"image_url":"PayPal.jpg","pay_url":"\/pay\/PayPal"}]}', true));
    }

    /** @test */
    public function getAvailablePaymentsEnableYoomoneyDirectPaymentsTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 2, 'ru', 'UA', 'windows');

        $paymentTypeSelector->enableYoomoneyDirectPayments();

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты оплата картой ПриватБанка","comission":2.5,"image_url":"privat_bank_cards.png","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"},{"name":"Терминалы IBOX","comission":4,"image_url":"interkassa_IBOX.jpg","pay_url":"\/pay\/interkassa\/IBOX"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[],"EBANX":[],"PayPal":[]}', true));
    }

    /** @test */
    public function getAvailablePaymentsCaseRewardTest() {

        $paymentTypeSelector = new PaymentTypeSelector('reward', 2, 'ru', 'UA', 'windows');

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), []);
    }

    /** @test */
    public function getAvailablePaymentsPayPalNotAvailableTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 2, 'ru', 'UA', 'windows');

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты оплата картой ПриватБанка","comission":2.5,"image_url":"privat_bank_cards.png","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"},{"name":"Терминалы IBOX","comission":4,"image_url":"interkassa_IBOX.jpg","pay_url":"\/pay\/interkassa\/IBOX"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[{"name":"Visa \/ MasterCard","comission":1,"image_url":"CardPay_VISA_MasterCard.jpg","pay_url":"\/pay\/CardPay\/VISA_MasterCard"}],"EBANX":[],"PayPal":[]}', true));
    }

    /** @test */
    public function getAvailablePaymentsGooglePayNotAvailableIndiaTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 2, 'ru', 'IN', 'android');

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"},{"name":"Терминалы IBOX","comission":4,"image_url":"interkassa_IBOX.jpg","pay_url":"\/pay\/interkassa\/IBOX"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[{"name":"Visa \/ MasterCard","comission":1,"image_url":"CardPay_VISA_MasterCard.jpg","pay_url":"\/pay\/CardPay\/VISA_MasterCard"}],"EBANX":[],"PayPal":[],"GooglePay":[]}', true));
    }

    /** @test */
    public function getAvailablePaymentsGooglePayAvailableTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 2, 'ru', 'en', 'android');

        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[{"name":"Visa \/ MasterCard","comission":1,"image_url":"CardPay_VISA_MasterCard.jpg","pay_url":"\/pay\/CardPay\/VISA_MasterCard"}],"EBANX":[],"PayPal":[],"GooglePay":[{"name":"GooglePay","comission":1,"image_url":"GooglePay.jpg","pay_url":"\/pay\/GooglePay"}]}', true));
    }

    /** @test */
    public function getAvailablePaymentsApplePayAvailableTest() {

        $paymentTypeSelector = new PaymentTypeSelector('book', 2, 'ru', 'en', 'ios');


        $this->assertEquals($paymentTypeSelector->getAvailablePayments(), json_decode('{"Interkassa":[{"name":"Банковские карты","comission":2.5,"image_url":"interkassa_banks_cards.jpg","pay_url":"\/pay\/interkassa\/banks_cards"},{"name":"LiqPay","comission":2,"image_url":"interkassa_liqPay.jpg","pay_url":"\/pay\/interkassa\/liqPay"}],"Yandex.Kassa":[{"name":"QIWI-кошелек","comission":0,"image_url":"Yandex_QIWI-кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/QIWI-кошелек"},{"name":"Карты VISA \/ MasterCard","comission":3,"image_url":"Yandex_VISA_MasterCard.jpg","pay_url":"\/pay\/yandex.kassa\/VISA_MasterCard"},{"name":"Яндекс.Кошелек","comission":0,"image_url":"Yandex_Яндекс.Кошелек.jpg","pay_url":"\/pay\/yandex.kassa\/Яндекс.Кошелек"}],"CardPay":[{"name":"Visa \/ MasterCard","comission":1,"image_url":"CardPay_VISA_MasterCard.jpg","pay_url":"\/pay\/CardPay\/VISA_MasterCard"}],"EBANX":[],"PayPal":[],"ApplePay":[{"name":"ApplePay","comission":1,"image_url":"ApplePay.jpg","pay_url":"\/pay\/ApplePay"}]}', true));
    }
}
