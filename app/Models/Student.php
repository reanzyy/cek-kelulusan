<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['nis', 'name', 'class', 'status', 'path', 'created_at', 'updated_at'];
}
