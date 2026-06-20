<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SchoolClass;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'class_id'
    ];

    public function class()
    {
        return $this->belongsTo(
            SchoolClass::class,
            'class_id'
        );
    }
}