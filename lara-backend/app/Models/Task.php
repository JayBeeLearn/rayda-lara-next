<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'details', 'status', 'due_date', 'create_date' ,'start_date', 'complete_date' 
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeAuthUser($query){
        return $query->where('user_id', auth()->user()->id);
    }
}
