<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruteur extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company','info','user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
