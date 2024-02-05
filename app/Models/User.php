<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cartItems() {
        return $this->hasMany(Cart::class);
    }

    public function cartItemsWithProducts() {
        return Auth::user()->cartItems()
            ->leftJoin('products', 'product_id', 'products.id')
            ->select('carts.*', 'name', 'category', 'variations', 'price', 'photo', 'description')
            ->get();
    }

    public function cartQuantity() {
        return $this->cartItems()
            ->count();
    }

    public function cartTotalPrice() {
        $cartTotalPrice = 0;

        foreach(Auth::user()->cartItemsWithProducts() as $cartItem) {
            $cartTotalPrice += $cartItem['quantity'] * $cartItem['price'];
        }

        return $cartTotalPrice;
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function recentOrders() {
        return $this->orders()
            ->whereNotNull('payment')
            ->with('orderItems.product')
            ->with(['orderStatus' => function ($query) {
                $query->orderBy('id', 'desc');
            }])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function photo() {
        return 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . $this->id;
    }
}
