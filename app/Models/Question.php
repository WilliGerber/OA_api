<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'oa_questions';
    protected $primaryKey = 'id_question';
    public $timestamps = false;

    // Relacionamento com as alternativas
    public function alternatives()
    {
        return $this->hasMany(Alternative::class, 'question_id');
    }
}
