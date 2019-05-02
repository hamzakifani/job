<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'title','type', 'location', 'prix','discription', 'status','user_id','admin_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Job');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function emplois()
{
    return $this->hasMany('App\Emploi');
}
}
