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
        for ($i=1; $i < 23; $i++) { 
            Room::create([
                'libele' => 'chambre '.$i,
                'qntMax' => 5,
            ]);
        }

        // //Creation des niveaux d'etudes Licence
        // for ($i=1; $i < 4; $i++) { 
        //     Niveau::create([
        //         'libele' => 'Licence '.$i,
        //         'sigle' => 'L'.$i,
        //     ]);
        // }
        // //Creation des niveaux d'etudes Master
        // for ($i=1; $i < 3; $i++) { 
        //     Niveau::create([
        //         'libele' => 'Master '.$i,
        //         'sigle' => 'M'.$i,
        //     ]);
        // }

        // //Creation des filiéres
        // Sector::create(['libele' => 'Banquue Finances Assurances','sigle' => 'BAF']);
        // Sector::create(['libele' => 'Gestion des resources humaines','sigle' => 'GRH']);
        // Sector::create(['libele' => 'Genie Logiciel','sigle' => 'GELO']);
        // Sector::create(['libele' => 'Informatiques et réseaux','sigle' => 'IR']);
        // Sector::create(['libele' => 'Management des affaires internationales','sigle' => 'MAI']);
        // Sector::create(['libele' => 'Marketing Management Communication','sigle' => 'MMC']);
        // Sector::create(['libele' => 'Systéme réseaux et telecom','sigle' => 'SRT']);


    }
}
