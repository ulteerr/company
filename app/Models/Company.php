<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use  HasFactory;

    public function comments()
    {
        return $this->hasMany('App/Company', 'company_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App/User', 'user_id', 'id');
    }
}
