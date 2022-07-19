<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class StatusEnum extends Enum
{
    const aktif = 'Aktif';
    const nonAktif = 'Non Aktif';
    const domisioner = 'Domisioner';
}
