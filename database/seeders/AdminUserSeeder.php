<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Администратор',
            'user' => 'admin',
            'password' => bcrypt('Adminpass'),
            'role_id' => 1,
        ]);
    }
}
