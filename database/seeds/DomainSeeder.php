<?php

use Illuminate\Database\Seeder;
use App\Models\Domain;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = explode(',', env('SEED_DOMAINS'));
        foreach ($domains as $domain) {
            Domain::firstOrCreate(['url' => $domain]);
        }
    }
}
