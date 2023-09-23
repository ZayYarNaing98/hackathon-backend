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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'status' => $this->status,
            'image' => $this->image,
            'roles' => optional($this->roles->first())->name,

        ];
    }
}
