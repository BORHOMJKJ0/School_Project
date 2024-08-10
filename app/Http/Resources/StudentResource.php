<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'number' => $this->number,
            'name' => $this->name,
            'age' => $this->age,
            'class' => $this->class,
            'avg' => $this->avg,
            //  'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
