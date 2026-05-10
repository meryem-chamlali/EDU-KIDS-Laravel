<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'title_fr',
        'title_ar',
        'title_en',
        'description_fr',
        'description_ar',
        'description_en',
        'image',
        'audio_fr',
        'audio_ar',
        'audio_en'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function getTitle($lang = null)
    {
        $lang = $lang ?? app()->getLocale();
        return $this->{"title_$lang"};
    }

    public function getDescription($lang = null)
    {
        $lang = $lang ?? app()->getLocale();
        return $this->{"description_$lang"};
    }

    public function getAudio($lang = null)
    {
        $lang = $lang ?? app()->getLocale();
        return $this->{"audio_$lang"};
    }
}