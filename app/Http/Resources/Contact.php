<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'firstname' => ucwords($this->firstname),
            'lastname' =>  ucwords($this->lastname),
            'email' => $this->email,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'address1' => $this->address->address1 ?? null,
            'address2' => $this->address->address2 ?? null,
            'city' => $this->address->city ?? null,
            'state' => $this->address->state ?? null,
            'zip' => $this->address->zip ?? null,
        ];
    }
}
