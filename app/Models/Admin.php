<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    const ACTIVE = 1, INACTIVE = 2;

    protected $fillable = [
      'username','email','password','phone','status','name'  
    ];
    
}
