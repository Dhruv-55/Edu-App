<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchSubject extends Model
{
    use HasFactory;

    const ACTIVE = 1, INACTIVE =2 ;

    protected $fillable = [
        'batch_id','subjects','admin_id','status'
    ];

    protected $casts = [
        'subjects' => 'array'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
