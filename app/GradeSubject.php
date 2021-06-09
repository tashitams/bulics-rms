<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSubject extends Model
{
    public $timestamps = false;

    
    // // Relationship 
    // public function grades() {
    //     return $this->hasMany(Grade::class);
    // }

    // public function subjects() {
    //     return $this->hasMany(Subject::class);
    // }
    
}
