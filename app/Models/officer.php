<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class officer extends Model
{
    //
    protected $guarded =[];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
