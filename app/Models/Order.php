<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function fullAddress() {
        return $this->home_address . ', ' . $this->barangay . ', ' . $this->city . ', ' . $this->province . ', ' . $this->zip_code;
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatus() {
        return $this->hasMany(OrderStatus::class);
    }

    public function payment() {
        return json_decode($this->payment, true);
    }
}
