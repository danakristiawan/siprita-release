<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
    protected $table = 'preferensi';

    protected $fillable = [
        'user_id',
        'uraian',
        'satker_id_1',
        'satker_id_2',
        'satker_id_3',
        'satker_id_4',
        'satker_id_5',
    ];
}
