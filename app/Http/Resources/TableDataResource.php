<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TableDataResource extends JsonResource
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
            'table_title' => $this->table_title,
            'game_id' => $this->game_id,
            'max_player' => $this->max_player,
            'position_x' => $this->position_x,
            'position_y' => $this->position_y,
            'size_width' => $this->size_width,
            'size_height' => $this->size_height, 
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
