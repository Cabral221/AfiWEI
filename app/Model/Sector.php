<?php

namespace App\Model;

use App\Model\Student;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
