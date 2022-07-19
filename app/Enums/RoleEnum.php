<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class RoleEnum extends Enum
{
    const superadmin = 'superadmin';
    const admin = 'admin';
    const user = 'user';
}
