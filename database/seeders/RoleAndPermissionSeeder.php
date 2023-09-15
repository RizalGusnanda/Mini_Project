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
            'dashboard',
            'user.management',
            'role.permission.management',
            'menu.management',
            'daerah.management',
            'pengajaran.management',
            //user
            'user.index',
            'user.create',
            'user.edit',
            'user.destroy',
            'user.import',
            'user.export',

            //role
            'role.index',
            'role.create',
            'role.edit',
            'role.destroy',
            'role.import',
            'role.export',

            //permission
            'permission.index',
            'permission.create',
            'permission.edit',
            'permission.destroy',
            'permission.import',
            'permission.export',

            //assignpermission
            'assign.index',
            'assign.create',
            'assign.edit',
            'assign.destroy',

            //assingusertorole
            'assign.user.index',
            'assign.user.create',
            'assign.user.edit',

            //menu group 
            'menu-group.index',
            'menu-group.create',
            'menu-group.edit',
            'menu-group.destroy',

            //menu item 
            'menu-item.index',
            'menu-item.create',
            'menu-item.edit',
            'menu-item.destroy',
            //menu item 
            'kecamatan.index',
            'kecamatan.create',
            'kecamatan.edit',
            'kecamatan.destroy',
            //menu item 
            'kelurahan.index',
            'kelurahan.create',
            'kelurahan.edit',
            'kelurahan.destroy',
            //menu item 
            'spesialisasi.index',
            'spesialisasi.create',
            'spesialisasi.edit',
            'spesialisasi.destroy',
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
