<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderposition extends Model
{
    use HasFactory;
    use SoftDeletes;


    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

        protected $fillable = ['kolvo', 'price', 'product_id', 'order_id'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

            /**
             * Связь с таблицей Заказ
             * */
            public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
            {
                return $this->belongsTo(Order::class);
            }


            /**
             * Связь с таблицей Продукты
             * */
            public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
            {
                return $this->belongsTo(Product::class);
            }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */





}
