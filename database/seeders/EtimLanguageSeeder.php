<?php

namespace Database\Seeders;

use App\Models\EtimLanguage;
use Hamcrest\Description;
use Illuminate\Database\Seeder;

class EtimLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimLanguage::insert([
            ['id'=> 'nl_NL','Description' => 'Nederlands'],
            ['id'=> 'en_GB','Description' => 'English (UK)'],
            ['id'=> 'fr_FR','Description' => 'French (FR)'],
            ['id'=> 'es_ES','Description' => 'Spanish (ES)']

        ]);

       


    }
}
