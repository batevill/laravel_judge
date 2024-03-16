<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = ['position_id', 'position_gonarar'];


    public function position(){
        return $this->belongsTo('App\Positions');
    }

    public function offerchild()
    {
        return $this->hasMany(OfferChild::class, 'parent_id');
    }
}
