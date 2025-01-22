<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableData extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_title',
        'game_id',
        'max_player',
        'position_x',
        'position_y',
        'size_width',
        'size_height'
    ];
}
