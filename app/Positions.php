<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'position_id');
    }
}
