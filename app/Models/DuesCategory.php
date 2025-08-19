<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesCategory extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function duesMembers()
    {
        return $this->hasMany(DuesMembers::class, 'dues_categories_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'dues_categories_id');
    }
}
