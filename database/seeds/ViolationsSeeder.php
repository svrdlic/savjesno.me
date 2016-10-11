<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViolationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $violations = [
            'Prolazak kroz crveno svijetlo',
            'Preticanje kolone',
            'Preticanje na punoj liniji',
            'Nepropuštanje pješaka',
            'Koriščenje mobilnog telefona u vožnji',
            'Vožnja motora bez kacige',
            'Pogrešno prestrojavanje',
            'Nedozvoljeno polukružno okretanje',
            'Vožnja suprotnim smjerom jednosmjernom ulicom',
            'Vožnja pješačkom zonom',
            'Vožnja pod uticajem alkohola',
            'Nepropisno obezbijeđen tovar',
            'Ostalo'
        ];

        foreach ($violations as $violation) {

            DB::table('violations')->insert([
                'name' => $violation,
            ]);

        }
    }
}
