<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'name',
        'pdf_path',
        'thumbnail_path',
    ];
}
