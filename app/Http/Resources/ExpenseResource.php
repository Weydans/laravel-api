<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"          => $this->id,
            "user"        => ucwords($this->user->name),
            "description" => ucfirst($this->description),
            "date"        => date('d/m/Y', strtotime($this->date)),
            "value"       => "R$ " . number_format($this->value, 2, ",", "."),
            "created_at"  => $this->created_at,
            "updated_at"  => $this->updated_at,
        ];
    }
}
