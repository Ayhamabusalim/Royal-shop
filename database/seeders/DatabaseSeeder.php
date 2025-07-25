<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategoriesSeeder::class,
            SubCategoriesSeeder::class,
            ProductsSeeder::class,
           
            
           
        ]);

        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'admin'
            ],

            [
                'name' => 'user',
                'display_name' => 'user'
            ]

        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@royalshop.com',
            'password' => Hash::make('ayham1996'),
        ]);
        $user->addRole('admin');
    }
}
