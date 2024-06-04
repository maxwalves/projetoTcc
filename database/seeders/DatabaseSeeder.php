<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Ativar isso quando precisar fazer seed de países, estados e cidades
        //$this->call(LocationDatabaseSeeder::class);

        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);

        $viewUsersPermission = Permission::create(['name' => 'view users', 'guard_name' => 'web']);
        $editUsersPermission = Permission::create(['name' => 'edit users', 'guard_name' => 'web']);

        $adminRole->givePermissionTo([$viewUsersPermission, $editUsersPermission]);
       
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
