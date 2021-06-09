<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'index_number', 'subject_id', 'marks', 
    ];

    public $timestamps = false;
    

    // Relationship 

    public function student() 
    {
        return $this->belongsTo(Student::class);
    }

    public function subject() 
    {
        return $this->belongsTo(Subject::class);
    }
}
