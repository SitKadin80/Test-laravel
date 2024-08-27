<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'room_id'
    ];
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
    
}