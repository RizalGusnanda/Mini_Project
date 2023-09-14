<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'user.management']);
        Permission::create(['name' => 'role.permission.management']);
        Permission::create(['name' => 'menu.management']);
        Permission::create(['name' => 'daerah.management']);
        Permission::create(['name' => 'pengajaran.management']);
        //user
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.import']);
        Permission::create(['name' => 'user.export']);

        //role
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.destroy']);
        Permission::create(['name' => 'role.import']);
        Permission::create(['name' => 'role.export']);

        //permission
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.destroy']);
        Permission::create(['name' => 'permission.import']);
        Permission::create(['name' => 'permission.export']);

        //assignpermission
        Permission::create(['name' => 'assign.index']);
        Permission::create(['name' => 'assign.create']);
        Permission::create(['name' => 'assign.edit']);
        Permission::create(['name' => 'assign.destroy']);

        //assingusertorole
        Permission::create(['name' => 'assign.user.index']);
        Permission::create(['name' => 'assign.user.create']);
        Permission::create(['name' => 'assign.user.edit']);

        //menu group 
        Permission::create(['name' => 'menu-group.index']);
        Permission::create(['name' => 'menu-group.create']);
        Permission::create(['name' => 'menu-group.edit']);
        Permission::create(['name' => 'menu-group.destroy']);

        //menu item 
        Permission::create(['name' => 'menu-item.index']);
        Permission::create(['name' => 'menu-item.create']);
        Permission::create(['name' => 'menu-item.edit']);
        Permission::create(['name' => 'menu-item.destroy']);
        //menu item 
        Permission::create(['name' => 'kecamatan.index']);
        Permission::create(['name' => 'kecamatan.create']);
        Permission::create(['name' => 'kecamatan.edit']);
        Permission::create(['name' => 'kecamatan.destroy']);
        //menu item 
        Permission::create(['name' => 'kelurahan.index']);
        Permission::create(['name' => 'kelurahan.create']);
        Permission::create(['name' => 'kelurahan.edit']);
        Permission::create(['name' => 'kelurahan.destroy']);
        //menu item 
        Permission::create(['name' => 'spesialisasi.index']);
        Permission::create(['name' => 'spesialisasi.create']);
        Permission::create(['name' => 'spesialisasi.edit']);
        Permission::create(['name' => 'spesialisasi.destroy']);

        // create roles
        $roleUser = Role::create(['name' => 'user']);

        // create pegawai
        $roleUserPengajar = Role::create(['name' => 'user-pengajar']);


        // create Super Admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo([
            'name' => 'dashboard',
            'name' => 'user.management',
            'name' => 'role.permission.management',
            'name' => 'menu.management',
            'name' => 'daerah.management',
            'name' => 'pengajaran.management',
            //user
            'name' => 'user.index',
            'name' => 'user.create',
            'name' => 'user.edit',
            'name' => 'user.destroy',
            'name' => 'user.import',
            'name' => 'user.export',

            //role
            'name' => 'role.index',
            'name' => 'role.create',
            'name' => 'role.edit',
            'name' => 'role.destroy',
            'name' => 'role.import',
            'name' => 'role.export',

            //permission
            'name' => 'permission.index',
            'name' => 'permission.create',
            'name' => 'permission.edit',
            'name' => 'permission.destroy',
            'name' => 'permission.import',
            'name' => 'permission.export',

            //assignpermission
            'name' => 'assign.index',
            'name' => 'assign.create',
            'name' => 'assign.edit',
            'name' => 'assign.destroy',

            //assingusertorole
            'name' => 'assign.user.index',
            'name' => 'assign.user.create',
            'name' => 'assign.user.edit',

            //menu group 
            'name' => 'menu-group.index',
            'name' => 'menu-group.create',
            'name' => 'menu-group.edit',
            'name' => 'menu-group.destroy',

            //menu item 
            'name' => 'menu-item.index',
            'name' => 'menu-item.create',
            'name' => 'menu-item.edit',
            'name' => 'menu-item.destroy',
            //menu item 
            'name' => 'kecamatan.index',
            'name' => 'kecamatan.create',
            'name' => 'kecamatan.edit',
            'name' => 'kecamatan.destroy',
            //menu item 
            'name' => 'kelurahan.index',
            'name' => 'kelurahan.create',
            'name' => 'kelurahan.edit',
            'name' => 'kelurahan.destroy',
            //menu item 
            'name' => 'spesialisasi.index',
            'name' => 'spesialisasi.create',
            'name' => 'spesialisasi.edit',
            'name' => 'spesialisasi.destroy',
        ]);

        // $role->givePermissionTo(Permission::all());

        //assign user id 1 ke super admin
        $user = User::find(1);
        $user->assignRole('super-admin');

        //assign user id 2 ke super admin
        $roleUser = User::find(2);
        $roleUser->assignRole('user');

        $roleUserPengajar = User::find(3);
        $roleUserPengajar->assignRole('user-pengajar');

        //assign user id 3 ke user
    }
}
