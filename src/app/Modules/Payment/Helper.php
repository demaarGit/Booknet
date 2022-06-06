<?php

namespace App\Modules\Payment;

class Helper {

    public static function sort(array $array, string $field) {
        $sortArr = [];
        foreach($array as $key => $val){
            $sortArr[$key] = $val[$field];
        }

        array_multisort($sortArr, $array);

        return $array;
    }
}
