<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'username' => $this->username,
        ];
    }
    
    /**
     *
     * @param type \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'message' => 'success',
        ];
    }
}
