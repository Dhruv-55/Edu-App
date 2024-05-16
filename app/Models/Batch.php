<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    const ACTIVE = 1, INACTIVE = 2;


    protected $fillable = [
        'name','admin_id','status'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
