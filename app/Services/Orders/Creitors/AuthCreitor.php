<?php

namespace App\Services\Orders\Creitors;

use App\Models\Order;
use App\Models\Orderposition;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthCreitor extends Creitor
{

    private Order|null $order = null;
    private array $positions = [];

    public function createOrder(): Order|null
    {

        //Берем объекты позиций корзины
            $positionsBaskeet = $this->basket->getPosObj();

        try{

            DB::beginTransaction();

                //Создаем заказ
                    $this->order($positionsBaskeet);

                //Создаем позиции заказа
                    $this->positions($positionsBaskeet);

                //Очищаем корзину
                    if(!empty($this->order)) {
                        $this->basket->clearProductsBasket();
                    }

            DB::commit();

        } catch(\Exception $exception){

            DB::rollBack();

            // Allow Laravel engine to handle this exception
            //throw $exception;
        }

        return $this->order;
    }


    /**
     * Создаем заказ
     * */
    private function order($positionsBaskeet): void
    {
        //Подсчет Полной суммы заказа
            $summAll = 0;
            foreach ($positionsBaskeet as $position) {
                $summAll += $position->kolvo * $position->product->price;
            }

            $orderElem = new Order;
            $orderElem->user_id = $this->user->id;
            $orderElem->summ = $summAll;
            $orderElem->save();

            $this->order = $orderElem;
    }

    /**
     * Создаем позиции заказа
     * */
    private function positions($positionsBaskeet): void
    {
        if(!empty($this->order)) {
            $orderPositions = [];
            foreach ($positionsBaskeet as $position) {
                $orderPositions[] = [
                    'kolvo' => $position->kolvo,
                    'product_id' => $position->product_id,
                    'order_id' => $this->order->id,
                    'price' => $position->product->price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            $this->positions = $orderPositions;
            Orderposition::insert($orderPositions);
        }

    }



}
