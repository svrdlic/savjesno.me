<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['Andrijevica', 'AN'],
            ['Bar', 'BR'],
            ['Berane', 'BA'],
            ['Bijelo Polje', 'BP'],
            ['Budva', 'BD'],
            ['Gusinje', 'GS'],
            ['Danilovgrad', 'DG'],
            ['Žabljak', 'ŽB'],
            ['Kolašin', 'KL'],
            ['Kotor', 'KO'],
            ['Mojkovac', 'MK'],
            ['Nikšić', 'NK'],
            ['Plav', 'PL'],
            ['Plužine', 'PŽ'],
            ['Petnjica', 'PT'],
            ['Pljevlja', 'PV'],
            ['Podgorica', 'PG'],
            ['Rožaje', 'RO'],
            ['Tivat', 'TV'],
            ['Ulcinj', 'UL'],
            ['Herceg Novi', 'HN'],
            ['Cetinje', 'CT'],
            ['Šavnik', 'ŠN']
        ];

        foreach ($cities as $city) {

            DB::table('cities')->insert([
                'name' => $city[0],
                'code' => $city[1]
            ]);

        }

    }
}
