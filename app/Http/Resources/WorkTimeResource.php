<?php

namespace App\Http\Resources;

use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkTimeResource extends JsonResource
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
            'employee_id' => $this->employee_id,
            'status' => $this->status === WorkTime::STATUS['start'] ? 'started': 'stopped',
            'value' => $this->value,
            'started_at' => $this->created_at,
            'stopped_at' => $this->updated_at,
        ];
    }
}
