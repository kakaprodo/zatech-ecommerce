<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $email = 'admin@gmail.com';
        $adminRole = Role::whereName(Role::ADMIN)->first();

        User::whereEmail($email)->delete();

        User::factory()->count(1)->state([
            'email' => $email
        ])->hasAttached($adminRole)->create();
    }
}
