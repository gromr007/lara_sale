<?php

namespace App\Services\Orders\Deleters;


use Illuminate\Support\Facades\DB;

class BdDeleter extends Deleters
{
    /**
     * Удаляем продукт
     * */
    public function deleteOrder(int $orderId): void
    {

        try{

            DB::beginTransaction();

                //Проверяем есть ли заказ
                $order = $this->repositories['order']->getFirstId($this->user->id, $orderId);

                //Берем привязанные позиции
                $orderPositionsQuery = null;
                if(!empty($order)) {
                    $orderPositionsQuery= $this->repositories['orderposition']->getPositionsQuery($order->id);
                }

                //Удаляем
                if(!empty($order)) {
                    $order->delete();
                }
                if(!empty($orderPositionsQuery)) {
                    $orderPositionsQuery->delete();
                }

            DB::commit();

        } catch(\Exception $exception){

            DB::rollBack();
            throw $exception;
        }

    }
}
