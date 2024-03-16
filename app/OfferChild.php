<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferChild extends Model
{
    protected $table = 'offer_child';
    protected $fillable = ['parent_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
