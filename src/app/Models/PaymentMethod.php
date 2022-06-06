<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {

    public $timestamps = false;

    protected $hidden = [
        'id',
        'payment_system_id',
    ];

    protected $table = 'payment_methods';
}
