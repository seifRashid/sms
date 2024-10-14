<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guardian()
    {
        //has one guardian
        return $this->hasOne(Guardian::class);
    }
    public function teacher()
    {
        //has one guardian
        return $this->hasOne(Teacher::class);
    }
    public function darasa()
    {
        //has one guardian
        return $this->hasOne(Darasa::class);
    }

}
