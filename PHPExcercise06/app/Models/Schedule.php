<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['begin', 'end', 'place', 'content', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class)->withTimestamps();
    }
}
