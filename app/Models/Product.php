<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'variations',
        'photo',
        'sub_photos',
        'status',
    ];

    public function stock() {
        return $this->hasMany(Stock::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function stocks() {
        return $this->hasMany(Stock::class);
    }

    public static function groupedProducts($items) {
        $productGroups = [];

        foreach ($items as $item) {
            $name = $item['name'];
            $variations = json_decode($item['variations'], true);

            if (!isset($productGroups[$name])) {
                $productGroups[$name] = [
                    'id' => $item['id'],
                    'price' => $item['price'],
                    'category' => $item['category'],
                    'photo' => $item['photo'],
                    'sub_photos' => $item['sub_photos'],
                    'lazada_link' => $item['lazada_link'],
                    'shopee_link' => $item['shopee_link'],
                    'description' => $item['description'],
                    'variations' => []
                ];
            }

            foreach ($variations as $variationName => $variationValue) {
                if (!isset($productGroups[$name]['variations'][$variationName])) {
                    $productGroups[$name]['variations'][$variationName] = [];
                }

                if (!in_array($variationValue, $productGroups[$name]['variations'][$variationName])) {
                    $productGroups[$name]['variations'][$variationName][] = $variationValue;
                }
            }
        }

        $products = [];
        foreach ($productGroups as $name => $data) {
            $productVariations = [];
            foreach ($data['variations'] as $variationName => $variationValues) {
                $productVariations[] = [
                    'name' => $variationName,
                    'values' => $variationValues
                ];
            }

            $products[] = [
                'id' => $data['id'],
                'name' => $name,
                'price' => $data['price'],
                'category' => $data['category'],
                'photo' => $data['photo'],
                'sub_photos' => $data['sub_photos'],
                'lazada_link' => $data['lazada_link'],
                'shopee_link' => $data['shopee_link'],
                'description' => $data['description'],
                'variations' => $productVariations
            ];
        }

        return $products;
    }

    public function availableStocks() {
        $totalStocks = $this->stocks()
            ->sum('quantity');

        $totalSold = $this->orderItems()
            ->join('order_statuses', function($join) {
                $join->on('order_items.order_id', 'order_statuses.order_id');
                $join->where('is_current', '1');
                $join->where(function($condition) {
                    $condition->where('status', 'Ready to Ship');
                    $condition->orWhere('status', 'Shipped');
                    $condition->orWhere('status', 'Out for Delivery');
                    $condition->orWhere('status', 'Delivered');
                    $condition->orWhere('status', 'Completed');
                });
            })
            ->sum('quantity');

        return $totalStocks - $totalSold;
    }
}
