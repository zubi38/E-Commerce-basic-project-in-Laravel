<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'name'=>'Vivo  phone',
            'price'=>'34,299',
            'catagery'=>'Mobile',
            'gallery'=>'https://in-exstatic-vivofs.vivo.com/gdHFRinHEMrj3yPG/1642573715328/3b496d73b3831ca1959d63c13f01afe7.png',
            'description'=>'64GB storage with 4GB Ram smart phone'
            
        ],
        [
            'name'=>'Tecno phone',
            'price'=>'24,999',
            'catagery'=>'Mobile',
            'gallery'=>'https://fdn2.gsmarena.com/vv/pics/tecno/tecno-spark8-pro-1.jpg',
            'description'=>'64GB storage with 4GB Ram smart phone'
        ],
        [
            'name'=>'LG Tv',
            'price'=>'50000',
            'catagery'=>'Television',
            'gallery'=>'https://www.lg.com/us/images/tvs/md08002150/gallery/D-01_v1.jpg',
            'description'=>'4k Ultra HD' 
        ],
        [
           'name'=>'Samsung TV',
            'price'=>'60000',
            'catagery'=>'Television',
            'gallery'=>'https://images.samsung.com/is/image/samsung/pk-hd-t4300-ua32t5300auxmm-frontblack-265965200?$730_584_PNG$',
            'description'=>'HD display with 32 and 43 inch sizes' 
        ],
        [
           'name'=>'Orient fridge',
            'price'=>'72000',
            'catagery'=>'Refrigerator',
            'gallery'=>'https://cdn.shopify.com/s/files/1/2459/1583/products/Marvel-Blaze-Red_929b0370-1f64-482f-849b-9bf650f286b4_2000x_crop_center.png?v=1655973750',
            'description'=>'DC inverter large size'
        ]
        ]);
    }
}
