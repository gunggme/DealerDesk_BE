<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresetDataResource extends JsonResource
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
            'preset_name' => $this->preset_name,
            'time_table_data' => $this->time_table_data,
            'prize_array_data' => $this->prize_array_data,
            'buy_in_price' => $this->buy_in_price,
            'starting_chip' => $this->starting_chip
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
