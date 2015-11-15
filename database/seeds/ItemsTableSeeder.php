<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
        	'owner' => 1,
            'description' => str_random(10),
            'done' => false   
        ]);
    }
}
