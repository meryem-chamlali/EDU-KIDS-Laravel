<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'name_en',
        'description',
        'description_ar',
        'description_en',
        'image',
        'type'
    ];

    protected $casts = [
        'type' => 'string'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getName($lang = null)
    {
        if ($lang === 'ar') return $this->name_ar;
        if ($lang === 'en') return $this->name_en;
        return $this->name;
    }

    public function getDescription($lang = null)
    {
        if ($lang === 'ar') return $this->description_ar;
        if ($lang === 'en') return $this->description_en;
        return $this->description;
    }
}
