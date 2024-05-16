<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    const THEORETICAL = 1, PRACTICAL = 2;
    const ACTIVE = 1, INACTIVE = 2;


    protected $fillable = [
        'name','type','admin_id','status'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
