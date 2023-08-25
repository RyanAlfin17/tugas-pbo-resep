<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'reseps'; // Nama tabel di database

    protected $fillable = [
        'id',
        'title',
        'photo',
        'description',
        'ingredient',
        'instruction'
    ];
}
