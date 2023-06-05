<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    use HasFactory;

    protected $table = 'oa_learn';
    protected $primaryKey = 'id_learn';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'tag',
        'level_id',
        'subject_id',
        'text',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
