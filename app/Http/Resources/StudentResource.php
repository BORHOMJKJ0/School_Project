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
            'name' => $this->name,
            'age' => $this->age,
            'number' => $this->number,
            'class' => $this->class,
            'avg' => $this->avg,
            'Date_of_apply_to_school' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
