<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_question'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function readyanswers()
    {
        return $this->hasMany(ReadyAnswer::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
