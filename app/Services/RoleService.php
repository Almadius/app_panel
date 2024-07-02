<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public function getAllRoles()
    {
        return Role::all();
    }

    public function createRole(array $data)
    {
        return Role::create($data);
    }

    public function updateRole(Role $role, array $data)
    {
        return $role->update($data);
    }

    public function deleteRole(Role $role)
    {
        return $role->delete();
    }

    public function createPermission(array $data)
    {
        return Permission::create($data);
    }

    public function assignPermissionToRole(string $roleName, string $permissionName)
    {
        $role = Role::findByName($roleName);
        $permission = Permission::findByName($permissionName);

        return $role->givePermissionTo($permission);
    }
}

