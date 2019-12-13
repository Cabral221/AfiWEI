<?php

namespace App\Model;

use App\Model\Student;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = ['libele','qntMax'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Permet de savoir la situation de la chambre
     *
     * @return boolean
     */
    public function complete()
    {
        return $this->students()->count() >= $this->qntMax ? true : false;
    }

    
    public static function getDisponible()
    {
        $roomDis = [];
        $all = self::all();
        foreach ($all as $key => $value) {
            if($value->students->count() < 10){
                $roomDis[] = $value;
            }
        }
        return $roomDis;
    }
}
