<?php

namespace App\Services\Basket\Deleters;


class AuthDeleter extends Deleters
{
    /**
     * Удаляем продукт
     * */
    public function deleteProduct(): bool
    {
        //Берем продукт
            $product = $this->repositories['product']->getFirst($this->request['id_product']);

        if( !empty($product) ) {
            //Проверяем есть ли позиция в корзине
            $positionUser = $this->repositories['basketposition']->getProductUser($product->id, $this->user->id);

            if(!empty($positionUser)) {
                $positionUser->delete();
                return true;
            }
        }

        return false;
    }
}
