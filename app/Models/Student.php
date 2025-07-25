<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

   protected $fillable = ['name', 'email', 'country_id', 'date_of_birth', 'phone'];

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

}
