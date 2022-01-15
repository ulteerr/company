<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function company()
    {
        return $this->belongsTo('App/Company', 'company_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
