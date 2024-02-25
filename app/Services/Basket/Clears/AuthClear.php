<?php

namespace App\Services\Basket\Clears;


class AuthClear extends Clears
{
    /**
     * Удаляем продукт
     * */
    public function clearBasket(): bool
    {

        //Проверяем есть ли позиция в корзине
        $positionsUser = $this->repositories['basketposition']->getPositions($this->user->id);

        if(!empty($positionsUser)) {
            $positionsUser->delete();
            return true;
        }

        return false;
    }
}
