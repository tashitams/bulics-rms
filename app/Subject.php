<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name'];
    
    public $timestamps = false;

    public function setSubjectNameAttribute($value)
    {
        $this->attributes['subject_name'] = ucwords($value);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('subject_name', 'like', '%'.$query.'%');
    }


    // Relationship 

    public function grades() 
    {
        return $this->belongsToMany(Grade::class);
    }

    public function results() 
    {
        return $this->hasMany(Result::class);
    }
}
