<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;




class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
       // $this->call(CategoryTableSeeder::class);
        $this->call(AccessTableSeeder::class);
        $this->call(HistoryTypeTableSeeder::class);


        Model::reguard();
    }
}
