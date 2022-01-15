<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayrollsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Payroll::all();
    // }

    use Exportable;

    public function query()
    {
        //use joins and bring employeename employer name instead of just ids of employer/ees
        return Payroll::query();
    }

    public function headings(): array
    {
        return [
            'employee_id',
            'employer_id',
            'joining_date',
            'leaving_date'
        ];
    }

    public function map($payroll): array
    {
        return [
            $payroll->employee_id,
            $payroll->employer_id,
            $payroll->joining_date,
            $payroll->leaving_date
        ];
    }
}
