<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();

        DB::table('users')->insert([
            'name' => 'Guillot',
            'Prenom' => 'Paul',
            'email' => 'paul@moderateur.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'Moderateur' => 1,
            'remember_token' => 'ugUlI0znbQJcl1amGfcVofsBYCl4wkZSPp8njxk57f427jr7dYDoASlW4tCe',
        ]);

        DB::table('users')->insert([
            'name' => 'Cart',
            'Prenom' => 'Nicolas',
            'email' => 'nicolas@administrateur.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'Admin' => 1,
            'remember_token' => 'ugUlI0znbQJcl1amGfcVofsBYCl4wkZSPp8njxk57f427jr7dYDoASlW4tCe',
        ]);

        DB::table('users')->insert([
            'name' => 'Rolland',
            'Prenom' => 'Fanny',
            'email' => 'fanny@super-administrateur.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'SuperAdmin' => 1,
            'remember_token' => 'ugUlI0znbQJcl1amGfcVofsBYCl4wkZSPp8njxk57f427jr7dYDoASlW4tCe',
        ]);
    }
}
