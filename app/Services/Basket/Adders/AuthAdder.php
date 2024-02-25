<?php

namespace App\Services\Basket\Adders;

use App\Models\Basketposition;

class AuthAdder extends Adders
{
    public function addProduct(): int|null
    {
        $product = $this->repositories['product']->getFirst($this->request['id_product']);
        $idPos = null;
        //Добавляем продукт
        if(!empty($product)) {
            //Проверка нет ли продукта уже в корзине
            $positionUser = $this->repositories['basketposition']->getProductUser($product->id, $this->user);
            if(!empty($positionUser)) {
                $positionUser->kolvo = $this->request['kolvo'];
                $positionUser->save();
                $idPos = $positionUser->id;
            } else {
                $position = new Basketposition;
                $position->kolvo = $this->request['kolvo'];
                $position->product_id = $product->id;
                $position->user_id = $this->user->id;
                $position->save();
                $idPos = $position->id;
            }
        }
        return $idPos;
    }
}
