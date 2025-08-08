<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $table = 'satker';

    protected $fillable = [
        'kode',
        'nama',
        'zona',
    ];
}
