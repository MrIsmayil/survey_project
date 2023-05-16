<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadyAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_answer'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
