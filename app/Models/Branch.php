<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function material()
    {
        return $this->hasOne(Material::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function newsCategories()
    {
        return $this->hasMany(NewsCategory::class);
    }
}
