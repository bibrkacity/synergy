<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'fullname' => 'Україна',
            'briefname' => 'Україна',
            'english' => 'Ukraine',
        ]);

        DB::table('countries')->insert([
            'fullname' => 'Сполучене Королівство Великої Британії та Північної Ірландії',
            'briefname' => 'Велика Британія',
            'english' => 'Great Britain'
        ]);

         DB::table('countries')->insert([
            'fullname' => 'Сполучені Штати Америки',
            'briefname' => 'США',
            'english' => 'USA'
        ]);

        DB::table('countries')->insert([
            'fullname' => 'Народно-Демократична Республіка Ефіопія',
            'briefname' => 'Ефіопія',
            'english' => 'Ethiopia'
        ]);


    }

}
