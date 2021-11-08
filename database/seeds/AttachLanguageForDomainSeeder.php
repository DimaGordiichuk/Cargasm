<?php

use Illuminate\Database\Seeder;
use App\Models\Domain;
use App\Models\Language;

class AttachLanguageForDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::all();

        foreach (Domain::all() as $domain) {
            $domain->languages()->syncWithoutDetaching($languages->pluck('id')->toArray());
        }
    }
}
