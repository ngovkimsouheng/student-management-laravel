<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function classes()
    {
        return $this->belongsToMany(
            SchoolClass::class,
            'class_subject',
            'subject_id',
            'school_class_id'
        );
    }
}
