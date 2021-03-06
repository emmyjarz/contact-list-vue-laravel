<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'contact_id',
        'address1',
        'address2',
        'city',
        'state',
        'zip'
    ];
}
