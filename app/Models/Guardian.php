<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'phone_number',
        
    ];

    

    public function student()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
    
}
