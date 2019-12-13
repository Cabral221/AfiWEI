<?php

namespace App\Model;

use App\Model\Niveau;
use App\Model\Sector;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['lastname','firstname','phone','sector_id','niveau_id','room_id'];
    
    public function sector()
    {
        return $this->belongsTo(Sector::class,'sector_id');
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    
    public function niveau()
    {
        return $this->belongsTo(Niveau::class,'niveau_id');
    }
}
