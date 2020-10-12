<?php

namespace App\Exports;

use App\Transaksi;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::all();
    }

    public function headings(): array
    {
        return [
            'key',
            'ID',
            'Nominal',
            'Jenis',
            'Tanggal'
        ];
    }
}
