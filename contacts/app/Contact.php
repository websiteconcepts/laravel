<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'company',
        'position',
        'email',
        'phone_mobile',
        'phone_work'       
    ];

    /**
     * Get the addresses for the contact.
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}