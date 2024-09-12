<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task'; 
    protected $rememberTokenName = false; 

    protected $fillable = [
        'task',
        'EmpId',
        'status', 
        "created_at",
        "updated_at"
    ];
}
