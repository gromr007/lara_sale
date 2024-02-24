<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basketposition extends Model
{
    use HasFactory;
    use SoftDeletes;


    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

            protected $fillable = ['kolvo', 'product_id', 'user_id'];

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


            //Связь с таблицей product
            public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
            {
                return $this->belongsTo(Product::class);
            }

            //Связь с таблицей Пользователь
            public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
            {
                return $this->belongsTo(User::class);
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
