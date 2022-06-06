<?php

namespace App\Http\Controllers;

use App\Modules\Payment\PaymentTypeSelector;
use Illuminate\Http\Request;
use Illuminate\Container\Container;

class PaymentController extends Controller {

    public function items(Request $request) {
        $data = $request->all();

        $this->validate($request, [
            'productType' => 'required|string',
            'amount' => 'required|numeric|between:0.1,99.99',
            'lang' => 'required|string',
            'countryCode' => 'required|string',
            'userOs' => 'required|string',
        ]);
        $container = Container::getInstance();

        return response()->json($container->makeWith(PaymentTypeSelector::class, $data)->getAvailablePayments(), 200);
    }
}
