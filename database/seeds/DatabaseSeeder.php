<?php

use App\Model\Room;
use App\Model\Niveau;
use App\Model\Sector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // Creation des Chambres
        for ($i=1; $i < 43; $i++) { 
            if($i == 32 || $i == 34){
                Room::create([
                    'libele' => 'chambre '.$i,
                    'qntMax' => 6,
                ]);
            }else{
                Room::create([
                    'libele' => 'chambre '.$i,
                    'qntMax' => 5,
                ]);
            }
        }

        //Creation des niveaux d'etudes Licence
        for ($i=1; $i < 4; $i++) { 
            Niveau::create([
                'libele' => 'Licence '.$i,
                'sigle' => 'L'.$i,
            ]);
        }
        //Creation des niveaux d'etudes Master
        for ($i=1; $i < 3; $i++) { 
            Niveau::create([
                'libele' => 'Master '.$i,
                'sigle' => 'M'.$i,
            ]);
        }



    }
}
