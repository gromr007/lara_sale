<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

            protected string $table = 'orders';
            protected $guarded = ['id'];
            protected $fillable = ['summ', 'user_id'];

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
            * Связь с таблицей Позиции заказа
            */
            public function orderpositions(): \Illuminate\Database\Eloquent\Relations\HasMany
            {

                return $this->hasMany(Orderposition::class);

            }

            /*
             * Связь многие ко многим с таблицей Product через таблицу orderpositions
             * */
            public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
            {
                return $this->belongsToMany(Product::class, 'orderpositions');
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
