<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
           'name' => 'English',
           'lang' => 'en'
        ]);
        Language::create([
            'name' => 'Русский',
            'lang' => 'ru'
        ]);
    }
}
