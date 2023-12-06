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
                'description' => $data['description'],
                'variations' => $productVariations
            ];
        }

        return $products;
    }
}
