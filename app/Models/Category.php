<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'name_fr',
        'name_ar',
        'name_en',
        'description_fr',
        'description_ar',
        'description_en',
        'icon',
        'image',
        'color'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function getName($lang = null)
    {
        $lang = $lang ?? app()->getLocale();
        return $this->{"name_$lang"};
    }

    public function getDescription($lang = null)
    {
        $lang = $lang ?? app()->getLocale();
        return $this->{"description_$lang"};
    }
}
