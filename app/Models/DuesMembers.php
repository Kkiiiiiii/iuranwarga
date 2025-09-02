<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMembers extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function duesCategory()
    {
        return $this->belongsTo(DuesCategory::class, 'dues_categories_id');
    }
}
