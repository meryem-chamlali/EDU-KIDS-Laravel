<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'question',
        'question_ar',
        'question_en',
        'correct_answer',
        'option1',
        'option2',
        'option3',
        'option1_ar',
        'option2_ar',
        'option3_ar',
        'option1_en',
        'option2_en',
        'option3_en'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
