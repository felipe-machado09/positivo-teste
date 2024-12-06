<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        Role::findOrFail(2)->permissions()->sync($admin_permissions);

        $assistente_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(3)->permissions()->sync($assistente_permissions);

        $cadastro_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) == 'student_' &&  substr($permission->title, 0, 14) != 'student_class_';
        });
        Role::findOrFail(4)->permissions()->sync($cadastro_permissions);
    }
}
