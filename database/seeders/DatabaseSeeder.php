<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    //use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Support\Facades\Schema;

    public function run()
    {

        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call(UsersTableSeeder::class);

        Model::reguard();

        Schema::enableForeignKeyConstraints();
 }

}

