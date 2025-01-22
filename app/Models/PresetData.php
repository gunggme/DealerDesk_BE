<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresetData extends Model
{
    use HasFactory;

    protected $fillable = [
        'preset_name',
        'time_table_data',
        'prize_array_data',
        'buy_in_price',
        'starting_chip'
    ];
}
