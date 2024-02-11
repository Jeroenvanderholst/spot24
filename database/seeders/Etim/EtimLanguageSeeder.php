<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\EtimLanguage;
use Hamcrest\Description;
use Illuminate\Database\Seeder;

class EtimLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimLanguage::create([
            'id'=> 'nl_NL',
            'Description' => 'Nederlands'
        ]);

        EtimLanguage::create([
            'id'=> 'en_GB',
            'Description' => 'English (UK)'
        ]);

        EtimLanguage::create([
            'id'=> 'fr_FR',
            'Description' => 'French (FR)'
        ]);

        EtimLanguage::create([
            'id'=> 'es_ES',
            'Description' => 'Spanish (ES)'
        ]);



    }
}
