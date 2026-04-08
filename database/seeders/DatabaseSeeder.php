<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            IconsSeeder::class,
            ModuleSeeder::class
        ]);

        $roles = ['admin', 'user'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web',
            ]);
        }

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123@'),
                'role' => 'admin',
            ],

            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);

            $newUser->assignRole($user['role']);
        }

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
