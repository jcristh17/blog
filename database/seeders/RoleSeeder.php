<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1=Role::create(['name'=>'Admin',]);
        $role2=Role::create(['name'=>'Blogger',]);

        Permission::create(
                            [
                                'name' => 'admin.home',
                                'description'=>"View Dashboard"
        
                            ])->syncRoles([$role1,$role2]);
        //permisos para users
        Permission::create(['name' => 'admin.users.index','description'=>"View Users list"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description'=>"Assing Role to users"])->syncRoles([$role1]);

        //permisos para categorias
        Permission::create(['name' => 'admin.categories.index','description'=>"View Categories List"])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create','description'=>"Create Categories"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit','description'=>"Modify Categories"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy','description'=>"Delete Categories List"])->syncRoles([$role1]);
        //permisos para tags
        Permission::create(['name' => 'admin.tags.index','description'=>"View Tags List"])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.create','description'=>"Create Tags"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit','description'=>"Modify Tags"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy','description'=>"Delete Tags"])->syncRoles([$role1]);
        //permisos para roles
        Permission::create(['name' => 'admin.roles.index','description'=>"View Roles List"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create','description'=>"Create Roles"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit','description'=>"Modify Roles"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description'=>"Delete Roles"])->syncRoles([$role1]);
        //permisos para Permissions
        Permission::create(['name' => 'admin.permissions.index','description'=>"View Permissions List"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.create','description'=>"Create Permissions"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.edit','description'=>"Modify Permissions"])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.destroy','description'=>"Delete Permissions"])->syncRoles([$role1]);
        //permisos para posts
        Permission::create(['name' => 'admin.posts.index','description'=>"View Posts List"])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.create','description'=>"Create Posts"])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.edit','description'=>"Modify Posts"])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.destroy','description'=>"Delete Posts"])->syncRoles([$role1,$role2]);

  
        
        //$role1->permissions()->attach();

    }
}
