<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $guard = 'student';

    protected $fillable = [
        'name', 'index_no', 'password', 'grade_id', 
    ];

    protected $primaryKey = 'index_no';
    public $incrementing = false;

    public $timestamps = false;

    
    protected $hidden = [
        'password',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('index_no', 'like', '%'.$query.'%');
    }



    // Relationship 

    public function grade() 
    {
        return $this->belongsTo(Grade::class);
    }

    public function results() 
    {
        return $this->hasMany(Result::class, 'index_number', 'index_no');
    }
}
