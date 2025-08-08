<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dues_category extends Model
{
    protected $guarded =[];

    public function Dues_category()
    {
        return $this->belongsTo(user::class, 'users_id');
    }
}
