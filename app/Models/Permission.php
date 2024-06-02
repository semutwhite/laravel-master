<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SPermission;

class Permission extends SPermission
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';

    /**
     * List of default permissions and their descriptions.
     *
     * @var array
     */
    public static $defaultPermissions = [
        //permissions for users
        'view-users' => 'View users',
        'create-users' => 'Create new users',
        'update-users' => 'Update existing users',
        'delete-users' => 'Delete existing users',
        'restore-users' => 'Restore deleted users',
        //permissions for roles
        'view-roles' => 'View roles',
        'create-roles' => 'Create new roles',
        'update-roles' => 'Update existing roles',
        'delete-roles' => 'Delete existing roles',
        'restore-roles' => 'Restore deleted roles',
    ];
}
