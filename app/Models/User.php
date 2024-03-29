<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;


    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

            /**
             * The attributes that are mass assignable.
             */
            protected $fillable = [
                'name',
                'email',
                'password',
            ];

            /**
             * The attributes that should be hidden for serialization.
             */
            protected $hidden = [
                'password',
                'remember_token',
            ];

            /**
             * The attributes that should be cast.
             */
            protected $casts = [
                'email_verified_at' => 'datetime',
            ];



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
             * Связь с таблицей Позиции корзины
             */
            public function basketpositions(): \Illuminate\Database\Eloquent\Relations\hasMany
            {

                return $this->hasMany(Basketposition::class);

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
