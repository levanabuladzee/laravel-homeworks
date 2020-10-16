<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->phone('Google', 'Pixel 5', 'Black', 12, 799);
        $this->phone('iPhone', 'SE', 'White', 30, 999);
        $this->phone('Samsung', 'Galaxy', 'Black', 24, 399);
        $this->phone('Huawei', 'P40', 'Red', 44, 599);
        $this->phone('OnePlus', 'Nord', 'Blue', 17, 359);
        $this->phone('Samsung', 'Galaxy Z Fold 2', 'Purple', 28, 1449);
        $this->phone('Samsung', 'Galaxy Note 20', 'Black', 22, 1299);
    }

    public function phone($brand, $model, $color, $stock, $price) {
        DB::table('phones')->insert([
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'stock' => $stock,
            'price' => $price
        ]);
    }
}
