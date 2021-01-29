<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\web::factory(10)->create();
    }
}
