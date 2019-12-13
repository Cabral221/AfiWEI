<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['libele','sigle'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
