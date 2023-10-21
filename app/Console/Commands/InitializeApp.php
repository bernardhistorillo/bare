<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class InitializeApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Drop tables
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->line("Dropping table: $table");
            Schema::drop($table);
        }

        $this->line('');

        // Migrate tables
        $this->call('migrate');
        $this->line('');

        // Create Users
        $this->line('Creating Users');

        $users = [
            [
                'name' => 'BARE Admin',
                'email' => 'help@wearebare.co',
                'password' => Hash::make('Jnd7byUTpaaXdnjWwfWo'),
                'role' => 1,
            ], [
                'name' => 'Bernard Historillo',
                'email' => 'bernardhistorillo1@gmail.com',
                'password' => Hash::make('Password1'),
                'role' => 0,
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }

        $this->line('');

        // Add Items
        $this->line('Adding Items');
        $items = [
            [
                'name' => 'Cocoa',
                'description' => 'Choosing the Cocoa color for our nipple cover product involved thoughtful consideration and meticulous selection. Our primary objective was to provide a solution that caters to a diverse range of skin tones, ensuring that our product offers a natural and seamless blend.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/product-1.webp',
                'status' => 1,
            ], [
                'name' => 'Caramel',
                'description' => 'Caramel color offers a natural flattering tone that complements a wide range of skin tones. This versatility ensures that nipple covers will seamlessly blend with various complexions, making them suitable for a diverse customer base.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/product-2.webp',
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Taupe exudes a timeless and neutral aesthetic that effortlessly blends with a wide array of skin tones. Its balanced combination of warm and cool undertones ensures that the nipple covers complement and enhance the natural beauty of diverse individuals.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/product-3.webp',
                'status' => 1,
            ], [
                'name' => 'Clay',
                'description' => 'Clay exudes a sense of warmth and intimacy, creating a soothing and comforting experience for users. Clay color represents a natural and earthy tone that resonates with a sense of grounding and authenticity. This organic quality allows the nipple covers to seamlessly blend with a variety of skin tones, ensuring inclusivity and versatility.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/product-4.webp',
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Nude color closely resembles the natural skin tone, creating a seamless and invisible appearance when worn. This discreet and barely-there quality allows individuals to confidently wear the nipple covers without drawing unnecessary attention.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/nude.webp',
                'status' => 1,
            ], [
                'name' => 'Pale',
                'description' => 'Pale color exudes a sense of purity and delicacy, evoking a pristine and ethereal aesthetic. The clean and bright hue creates a visually pleasing contrast against the skin, enhancing the natural beauty of the wearer. This purity contributes to a subtle and elegant appearance, allowing the nipple covers to blend seamlessly with various outfits and styles.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/pale.webp',
                'status' => 1,
            ], [
                'name' => 'Sand',
                'description' => 'Sand color evokes a sense of serenity and tranquility, reminiscent of pristine beaches and calming coastal landscapes. This soothing and peaceful aesthetic can create a relaxing and comfortable experience for individuals wearing the nipple covers. It offers a versatile and neutral option that blends seamlessly with a variety of skin tones.',
                'category' => 'Nipple Covers',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/sand.webp',
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Taupe exudes a timeless and neutral aesthetic that effortlessly blends with a wide array of skin tones. Its balanced combination of warm and cool undertones ensures that the nipple covers complement and enhance the natural beauty of diverse individuals.',
                'category' => 'Flat Nipple Covers For Men',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/product-3.webp',
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Nude color closely resembles the natural skin tone, creating a seamless and invisible appearance when worn. This discreet and barely-there quality allows individuals to confidently wear the nipple covers without drawing unnecessary attention.',
                'category' => 'Flat Nipple Covers For Men',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/nude.webp',
                'status' => 1,
            ], [
                'name' => 'Bare Zipper Pouch 1',
                'description' => 'Introducing our convenient and stylish Zipper Pouch for Nipple Covers. Designed with both practicality and fashion in mind, this pouch is the perfect accessory to keep your nipple covers organized and protected. Crafted from high-quality materials, it features a durable zipper closure that ensures your covers stay secure and easily accessible. The compact size makes it deal for discreetly carrying in your purse, gym bag, or suitcase, allowing you to confidently enjoy nipple cover convenience wherever you go. With it sleek design and versatile functionality, our Zipper Pouch for Nipple Covers is a must-have accessory for any fashion-conscious individual seeking a practical solution to keep their nipple covers safe and stylish.',
                'category' => 'Travel Pouch',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/pouch-brown.webp',
                'status' => 1,
            ], [
                'name' => 'Bare Zipper Pouch 2',
                'description' => 'Introducing our convenient and stylish Zipper Pouch for Nipple Covers. Designed with both practicality and fashion in mind, this pouch is the perfect accessory to keep your nipple covers organized and protected. Crafted from high-quality materials, it features a durable zipper closure that ensures your covers stay secure and easily accessible. The compact size makes it deal for discreetly carrying in your purse, gym bag, or suitcase, allowing you to confidently enjoy nipple cover convenience wherever you go. With it sleek design and versatile functionality, our Zipper Pouch for Nipple Covers is a must-have accessory for any fashion-conscious individual seeking a practical solution to keep their nipple covers safe and stylish.',
                'category' => 'Travel Pouch',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/pouch-light-brown.webp',
                'status' => 1,
            ], [
                'name' => 'Bare Dust Bag',
                'description' => 'Introducing our Dust Bags for Nipple Covers, a simple yet essential accessory for the care and protection of your nipple covers. Crafted from soft, breathable fabric, this dust bag provides a safe and hygienic storage solution to keep your nipple covers clean and free from dust, lint, and other debris. The drawstring closure ensures a secure fit, preventing any unwanted particles from entering the bag.',
                'category' => 'Travel Pouch',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/dust-bag.webp',
                'status' => 1,
            ], [
                'name' => 'Bare Zip Bag',
                'description' => 'Introducing our complimentary Ziplock Bags for Nipple Covers, designed to provide you with a convenient storage solution for your nipple covers. Made from durable material, this ziplock bags offers both practicality and visibility. With it’s compact size, it easily fits into your purse, gym bag, or suitcase, allowing you to keep your nipple covers within reach whenever you need them. Our free Ziplock Bags for Nipple Covers is a thoughtful addition to your purchase, ensuring that you can confidently carry and store your covers with ease.',
                'category' => 'Travel Pouch',
                'price' => 1000,
                'photo' => config('app.prod_url') . '/img/shop/zip-bag.webp',
                'status' => 1,
            ]
        ];

        foreach($items as $item) {
            Item::create($item);
        }

        $this->line('');

        return 0;
    }
}
