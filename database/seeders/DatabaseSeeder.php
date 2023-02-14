<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;

use App\Models\Role;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    //use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Support\Facades\Schema;

    public function run()
    {

        Model::unguard();
        Schema::disableForeignKeyConstraints();

        // $this->call(UsersTableSeeder::class);

        // Model::reguard();

        // Schema::enableForeignKeyConstraints();



        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        DB::table('orders')->truncate();
        DB::table('customers')->truncate();
        DB::table('users')->truncate();

        $userAdmin = User::create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'email_verified_at' => now()
        ]);

        $roleAdmin = Role::create([
            'name' => 'Admin'
        ]);

        $roleCustomer = Role::create([
            'name' => 'Customer'
        ]);

        $userAdmin->roles()->attach($roleAdmin->id);

        $userCustomers = User::factory(10)
        ->has(Customer::factory()
        ->has(Order::factory()->count(3))
        ->count(1))
        ->create();

        foreach ($userCustomers as $userCustomer) {
            $userCustomer->roles()->attach($roleCustomer->id);
        }

        Model::reguard();
        Schema::enableForeignKeyConstraints();
 }

}

