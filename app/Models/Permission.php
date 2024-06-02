<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SPermission;

class Permission extends SPermission
{
    use HasFactory;
}
