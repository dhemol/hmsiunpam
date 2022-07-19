<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class TypeEnum extends Enum
{
    const suratMasuk = 'Surat Masuk';
    const suratKeluar = 'Surat Keluar';
    const suratInternal = 'Surat Internal';
    const laporan = 'Laporan';
    const lainnya = 'Lainnya';
}
