<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkatanDinas extends Model
{
    use HasFactory;

    protected $table = 'ikatan_dinas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
