<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiAtasan extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_atasan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
