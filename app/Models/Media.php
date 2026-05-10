<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    
    protected $fillable = ['element_id', 'type', 'chemin', 'titre'];
    
    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}