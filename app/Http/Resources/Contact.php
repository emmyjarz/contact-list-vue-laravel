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
            'address' => $this->address,
        ];
    }
}
