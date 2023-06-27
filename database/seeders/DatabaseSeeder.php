<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        $role = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role);
    }
}
