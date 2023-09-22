<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'image' => $this->image,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'roles' => $this->roles->first()->name,
        ];
    }
}
