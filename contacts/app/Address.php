<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street_address',
        'suburb',
        'pincode'       
    ];

    public function contact()
    {
    	return $this->belongsTo('App\Contact');
    }
}
