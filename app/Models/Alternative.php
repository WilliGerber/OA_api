<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $table = 'oa_alternatives';
    protected $primaryKey = 'id_alternative';
    public $timestamps = false;
}
