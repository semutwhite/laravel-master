<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SRole;

class Role extends SRole
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
}
