<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'type' => 'user',
            'uuid' => (string) $this->uuid,
            'attributes' =>[
                'name' => (string)$this->username,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'gender' => $this->gender,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'jsonapi' => [
                'version' => env('APP_VERSION_API'),
            ],
        ];
    }
}
