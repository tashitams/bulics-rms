<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $fillable = ['class_name'];
    public $timestamps = false;


    public function setClassNameAttribute($value)
    {
        $this->attributes['class_name'] = ucwords($value);
    }

    // public function getSubjectIdAttribute() 
    // {
    // 	return $this->subjects->pluck('id');
    // }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('class_name', 'like', '%'.$query.'%');
    }


    // Relationship 

    public function subjects() 
    {
        return $this->belongsToMany(Subject::class);
    }

    public function students() 
    {
        return $this->hasMany(Student::class);
    }

}
