<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table = 'oa_alternatives';

    protected $fillable = [
        'question_id',
        'option',
        'alternative_text',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
