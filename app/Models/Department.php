<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Department extends Authenticatable
{
    use HasFactory, Notifiable;

      
    protected $table = 'department'; 
    protected $rememberTokenName = false; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deptName',
    ]; 
     
}
