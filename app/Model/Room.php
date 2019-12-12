<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
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
        return $this->students()->count() >= 4 ? true : false;
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
