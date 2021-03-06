<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'user_id', 'certificate'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
