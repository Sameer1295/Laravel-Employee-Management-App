<?php

namespace App\Exports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployersExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Employer::all();
    // }
    use Exportable;

    public function query()
    {
        return Employer::query();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'mobile_number',
            'address',
            'pf_number',
            'esic_number',
            'gst_number'
        ];
    }
    public function map($employer): array
    {
        return [
            $employer->id,
            $employer->name,
            $employer->mobile_number,
            $employer->address,
            $employer->pf_number,
            $employer->esic_number,
            $employer->gst_number
        ];
    }

}
