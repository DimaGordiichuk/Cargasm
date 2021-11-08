<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DBAlias;

class CarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(__DIR__ . '/dumps/export-cars.sql');

        DBAlias::insert($sql);

        \DB::table('car_models')->where('parent_id', 0)->update([
            'parent_id' => null,
        ]);
    }
}
