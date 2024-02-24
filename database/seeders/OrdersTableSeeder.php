<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Orderposition;
use Illuminate\Database\Seeder;
use DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = Order::factory(10)->create();

        $order->each(function ($order) {

            $orderposition = Orderposition::factory(4)->create([
                'order_id' => $order->id,
            ]);

        });

    }



}
