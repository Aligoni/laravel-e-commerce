<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Order extends Model
{
    use HasFactory, Uuid;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function orderProduct() {
        return $this->hasMany('App\Models\OrderProduct');
    }
}
