<?php

namespace Database\Seeders;

use App\Models\PaymentSystem;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{

    const PAYMENT_SYSTEMS = [
        [
            'name' => 'Interkassa',
            'PaymentMethods' => [
                [
                    'name' => 'Банковские карты',
                    'comission' => 2.5,
                    'image_url' => 'interkassa_banks_cards.jpg',
                    'pay_url' => '/pay/interkassa/banks_cards',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
                [
                    'name' => 'LiqPay',
                    'comission' => 2,
                    'image_url' => 'interkassa_liqPay.jpg',
                    'pay_url' => '/pay/interkassa/liqPay',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 2,
                ],
                [
                    'name' => 'Терминалы IBOX',
                    'comission' => 4,
                    'image_url' => 'interkassa_IBOX.jpg',
                    'pay_url' => '/pay/interkassa/IBOX',
                    'is_available' => true,
                    'countries' => 'ru,en',
                    'allowed_countries_rule' => 'not_allowed',
                    'priority' => 2,
                ]
            ],
        ],
        [
            'name' => 'Yandex.Kassa',
            'PaymentMethods' => [
                [
                    'name' => 'Карты "МИР"',
                    'comission' => 0,
                    'image_url' => 'mir.jpg',
                    'pay_url' => '/pay/yandex.kassa/mir',
                    'is_available' => true,
                    'countries' => 'ru',
                    'allowed_countries_rule' => 'allowed',
                    'priority' => 1,
                ],
                [
                    'name' => 'Карты VISA / MasterCard',
                    'comission' => 3,
                    'image_url' => 'Yandex_VISA_MasterCard.jpg',
                    'pay_url' => '/pay/yandex.kassa/VISA_MasterCard',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
                [
                    'name' => 'Яндекс.Кошелек',
                    'comission' => 0,
                    'image_url' => 'Yandex_Яндекс.Кошелек.jpg',
                    'pay_url' => '/pay/yandex.kassa/Яндекс.Кошелек',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
                [
                    'name' => 'QIWI-кошелек',
                    'comission' => 0,
                    'image_url' => 'Yandex_QIWI-кошелек.jpg',
                    'pay_url' => '/pay/yandex.kassa/QIWI-кошелек',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
            ],
        ],
        [
            'name' => 'CardPay',
            'PaymentMethods' => [
                [
                    'name' => 'Visa / MasterCard',
                    'comission' => 1,
                    'image_url' => 'CardPay_VISA_MasterCard.jpg',
                    'pay_url' => '/pay/CardPay/VISA_MasterCard',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
            ],
        ],
        [
            'name' => 'PayPal',
            'PaymentMethods' => [
                [
                    'name' => 'PayPal',
                    'comission' => 1,
                    'image_url' => 'PayPal.jpg',
                    'pay_url' => '/pay/PayPal',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
            ],
        ],
        [
            'name' => 'GooglePay',
            'PaymentMethods' => [
                [
                    'name' => 'GooglePay',
                    'comission' => 1,
                    'image_url' => 'GooglePay.jpg',
                    'pay_url' => '/pay/GooglePay',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
            ],
        ],
        [
            'name' => 'ApplePay',
            'PaymentMethods' => [
                [
                    'name' => 'ApplePay',
                    'comission' => 1,
                    'image_url' => 'ApplePay.jpg',
                    'pay_url' => '/pay/ApplePay',
                    'is_available' => true,
                    'countries' => '',
                    'allowed_countries_rule' => 'all',
                    'priority' => 1,
                ],
            ],
        ],
        [
            'name' => 'EBANX',
            'PaymentMethods' => [
                [
                    'name' => 'Банковская карта',
                    'comission' => 1,
                    'image_url' => 'EBANX.jpg',
                    'pay_url' => '/pay/EBANX',
                    'is_available' => true,
                    'countries' => 'MX,PE,CL,EQ,VE,CO,BR,AG',
                    'allowed_countries_rule' => 'allowed',
                    'priority' => 1,
                ],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::PAYMENT_SYSTEMS as $system) {
            $paymentSystem = PaymentSystem::create(['name' => $system['name']]);
            foreach ($system['PaymentMethods'] as $methods) {
                PaymentMethod::create([
                    'payment_system_id' => $paymentSystem->id,
                    'name' => $methods['name'],
                    'comission' => $methods['comission'],
                    'image_url' => $methods['image_url'],
                    'pay_url' => $methods['pay_url'],
                    'is_available' => $methods['is_available'],
                    'countries' => $methods['countries'],
                    'allowed_countries_rule' => $methods['allowed_countries_rule'],
                    'priority' => $methods['priority'],
                ]);
            }
        }
    }
}
