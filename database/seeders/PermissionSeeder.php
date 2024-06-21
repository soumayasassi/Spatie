<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list products']);
        Permission::create(['name' => 'delete products']) ;
        Permission::create(['name' => 'create products']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'create users']);


        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'create roles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('list products');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('delete products');
        $role2->givePermissionTo('create products');

        $role2->givePermissionTo('create users');
        $role2->givePermissionTo('list roles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
       // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
        // mot de passe password
    }

}
