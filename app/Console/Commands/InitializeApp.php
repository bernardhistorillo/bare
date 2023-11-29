<?php

namespace App\Console\Commands;

use App\Models\Product;
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
            if ($table === 'email_subscriptions') {
                $this->line("Skipping table: $table");
                continue;
            }

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
                'name' => 'Taupe',
                'description' => 'Tailored to complement medium to darker skin tone.',
                'category' => 'Flat Nipple Covers For Men',
                'price' => 239,
                'variations' => json_encode([
                    'Size' => '6cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/taupe.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/taupe-cover.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-desc.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Perfectly suited for light to LIGHT medium skin tones.',
                'category' => 'Flat Nipple Covers For Men',
                'price' => 239,
                'variations' => json_encode([
                    'Size' => '6cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/nude.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/nude-cover.webp',
                    config('app.prod_url') . '/img/shop/products/nude-desc.webp',
                    config('app.prod_url') . '/img/shop/products/nude-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Cocoa',
                'description' => 'Choosing the Cocoa color for our nipple cover product involved thoughtful consideration and meticulous selection. Our primary objective was to provide a solution that caters to a diverse range of skin tones, ensuring that our product offers a natural and seamless blend.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/cocoa.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/cocoa-cover.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-desc.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Cocoa',
                'description' => 'Choosing the Cocoa color for our nipple cover product involved thoughtful consideration and meticulous selection. Our primary objective was to provide a solution that caters to a diverse range of skin tones, ensuring that our product offers a natural and seamless blend.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/cocoa.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/cocoa-cover.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-desc.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Cocoa',
                'description' => 'Choosing the Cocoa color for our nipple cover product involved thoughtful consideration and meticulous selection. Our primary objective was to provide a solution that caters to a diverse range of skin tones, ensuring that our product offers a natural and seamless blend.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/cocoa.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/cocoa-cover.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-desc.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Cocoa',
                'description' => 'Choosing the Cocoa color for our nipple cover product involved thoughtful consideration and meticulous selection. Our primary objective was to provide a solution that caters to a diverse range of skin tones, ensuring that our product offers a natural and seamless blend.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/cocoa.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/cocoa-cover.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-desc.webp',
                    config('app.prod_url') . '/img/shop/products/cocoa-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Caramel',
                'description' => 'Caramel color offers a natural flattering tone that complements a wide range of skin tones. This versatility ensures that nipple covers will seamlessly blend with various complexions, making them suitable for a diverse customer base.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/caramel.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/caramel-cover.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-desc.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Caramel',
                'description' => 'Caramel color offers a natural flattering tone that complements a wide range of skin tones. This versatility ensures that nipple covers will seamlessly blend with various complexions, making them suitable for a diverse customer base.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/caramel.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/caramel-cover.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-desc.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Caramel',
                'description' => 'Caramel color offers a natural flattering tone that complements a wide range of skin tones. This versatility ensures that nipple covers will seamlessly blend with various complexions, making them suitable for a diverse customer base.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/caramel.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/caramel-cover.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-desc.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Caramel',
                'description' => 'Caramel color offers a natural flattering tone that complements a wide range of skin tones. This versatility ensures that nipple covers will seamlessly blend with various complexions, making them suitable for a diverse customer base.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/caramel.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/caramel-cover.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-desc.webp',
                    config('app.prod_url') . '/img/shop/products/caramel-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Tailored to complement medium to darker skin tone.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/taupe.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/taupe-cover.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-desc.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Tailored to complement medium to darker skin tone.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/taupe.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/taupe-cover.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-desc.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Tailored to complement medium to darker skin tone.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/taupe.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/taupe-cover.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-desc.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Taupe',
                'description' => 'Tailored to complement medium to darker skin tone.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/taupe.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/taupe-cover.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-desc.webp',
                    config('app.prod_url') . '/img/shop/products/taupe-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Clay',
                'description' => 'Clay exudes a sense of warmth and intimacy, creating a soothing and comforting experience for users. Clay color represents a natural and earthy tone that resonates with a sense of grounding and authenticity. This organic quality allows the nipple covers to seamlessly blend with a variety of skin tones, ensuring inclusivity and versatility.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/clay.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/clay-cover.webp',
                    config('app.prod_url') . '/img/shop/products/clay-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Clay',
                'description' => 'Clay exudes a sense of warmth and intimacy, creating a soothing and comforting experience for users. Clay color represents a natural and earthy tone that resonates with a sense of grounding and authenticity. This organic quality allows the nipple covers to seamlessly blend with a variety of skin tones, ensuring inclusivity and versatility.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/clay.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/clay-cover.webp',
                    config('app.prod_url') . '/img/shop/products/clay-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Clay',
                'description' => 'Clay exudes a sense of warmth and intimacy, creating a soothing and comforting experience for users. Clay color represents a natural and earthy tone that resonates with a sense of grounding and authenticity. This organic quality allows the nipple covers to seamlessly blend with a variety of skin tones, ensuring inclusivity and versatility.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/clay.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/clay-cover.webp',
                    config('app.prod_url') . '/img/shop/products/clay-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Clay',
                'description' => 'Clay exudes a sense of warmth and intimacy, creating a soothing and comforting experience for users. Clay color represents a natural and earthy tone that resonates with a sense of grounding and authenticity. This organic quality allows the nipple covers to seamlessly blend with a variety of skin tones, ensuring inclusivity and versatility.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shopproducts/clay.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/clay-cover.webp',
                    config('app.prod_url') . '/img/shop/products/clay-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Perfectly suited for light to LIGHT medium skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/nude.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/nude-cover.webp',
                    config('app.prod_url') . '/img/shop/products/nude-desc.webp',
                    config('app.prod_url') . '/img/shop/products/nude-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Perfectly suited for light to LIGHT medium skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/nude.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/nude-cover.webp',
                    config('app.prod_url') . '/img/shop/products/nude-desc.webp',
                    config('app.prod_url') . '/img/shop/products/nude-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Perfectly suited for light to LIGHT medium skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/nude.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/nude-cover.webp',
                    config('app.prod_url') . '/img/shop/products/nude-desc.webp',
                    config('app.prod_url') . '/img/shop/products/nude-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Nude',
                'description' => 'Perfectly suited for light to LIGHT medium skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/nude.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/nude-cover.webp',
                    config('app.prod_url') . '/img/shop/products/nude-desc.webp',
                    config('app.prod_url') . '/img/shop/products/nude-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Pale',
                'description' => 'Tailored for fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/pale.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/pale-cover.webp',
                    config('app.prod_url') . '/img/shop/products/pale-desc.webp',
                    config('app.prod_url') . '/img/shop/products/pale-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Pale',
                'description' => 'Tailored for fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/pale.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/pale-cover.webp',
                    config('app.prod_url') . '/img/shop/products/pale-desc.webp',
                    config('app.prod_url') . '/img/shop/products/pale-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Pale',
                'description' => 'Tailored for fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/pale.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/pale-cover.webp',
                    config('app.prod_url') . '/img/shop/products/pale-desc.webp',
                    config('app.prod_url') . '/img/shop/products/pale-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Pale',
                'description' => 'Tailored for fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/pale.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/pale-cover.webp',
                    config('app.prod_url') . '/img/shop/products/pale-desc.webp',
                    config('app.prod_url') . '/img/shop/products/pale-topless.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Sand',
                'description' => 'Effortlessly blend with very fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/sand.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/sand-cover.webp',
                    config('app.prod_url') . '/img/shop/products/sand-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Sand',
                'description' => 'Effortlessly blend with very fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/sand.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/sand-cover.webp',
                    config('app.prod_url') . '/img/shop/products/sand-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Sand',
                'description' => 'Effortlessly blend with very fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 249,
                'variations' => json_encode([
                    'Size' => '8cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/sand.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/sand-cover.webp',
                    config('app.prod_url') . '/img/shop/products/sand-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Sand',
                'description' => 'Effortlessly blend with very fair to light skin tones.',
                'category' => 'Nipple Covers',
                'price' => 269,
                'variations' => json_encode([
                    'Size' => '10cm',
                    'Adhesiveness' => 'Non-adhesive',
                ]),
                'photo' => config('app.prod_url') . '/img/shop/products/sand.webp',
                'sub_photos' => json_encode([
                    config('app.prod_url') . '/img/shop/products/sand-cover.webp',
                    config('app.prod_url') . '/img/shop/products/sand-desc.webp',
                ]),
                'status' => 1,
            ], [
                'name' => 'Zip Pouch',
                'description' => 'Care for your nipple covers with our Dust Bags. These essential accessories ensure your covers stay clean and free from debris. Crafted from soft, breathable fabric, the drawstring closure provides a hygienic storage solution, preserving your nipple covers\' quality and longevity.',
                'category' => 'Travel Pouch',
                'price' => 299,
                'variations' => json_encode([]),
                'photo' => config('app.prod_url') . '/img/shop/products/zip-pouch-1.webp',
                'sub_photos' => json_encode([]),
                'status' => 1,
            ], [
                'name' => 'Drawstring Bag',
                'description' => 'Care for your nipple covers with our Dust Bags. These essential accessories ensure your covers stay clean and free from debris. Crafted from soft, breathable fabric, the drawstring closure provides a hygienic storage solution, preserving your nipple covers\' quality and longevity.',
                'category' => 'Travel Pouch',
                'price' => 79,
                'variations' => json_encode([]),
                'photo' => config('app.prod_url') . '/img/shop/products/drawstring-bag.webp',
                'sub_photos' => json_encode([]),
                'status' => 1,
            ]
        ];

        foreach($items as $item) {
            Product::create($item);
        }

        $this->line('');

        return 0;
    }
}
