<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SRole;

class Role extends SRole
{
    use HasFactory;
}
