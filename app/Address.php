<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'contact_id',
        'type',
        'address1',
        'address2',
        'city',
        'state',
        'zip'
    ];
    public static function prepAddress($address)
    {
        return $address->address1 . " " . $address->address2 . ", " . $address->city . ", " . $address->state . " " . $address->zip;
    }
}
