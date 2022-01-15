<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromQuery, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Employee::all();
    // }
    use Exportable;

    public function query()
    {
        //take care of gender column as it is boolean
        return Employee::query();
    }
    public function map($employee): array
    {
        return [
            $employee->name,
            $employee->gender,
            $employee->designation,
            $employee->education,
            $employee->email,
            $employee->mobile_number,
            $employee->present_address,
            $employee->permanent_address,
            $employee->date_of_birth,
            $employee->mother_name,
            $employee->father_name,
            $employee->uan_number,
            $employee->esic_number,
            $employee->adhaar_number,
            $employee->pan_number,
            $employee->blood_group,
            $employee->body_mark,
            $employee->bank_name,
            $employee->branch_name,
            $employee->account_number,
            $employee->ifsc_code,
        ];
    }
    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'name',
    //         'gender',
    //         'designation',
    //         'education',
    //         'email',
    //         'mobile_number',
    //         'present_address',
    //         'permanent_address',
    //         'date_of_birth',
    //         'mother_name',
    //         'father_name',
    //         'uan_number',
    //         'esic_number',
    //         'adhaar_number',
    //         'pan_number',
    //         'blood_group',
    //         'body_mark',
    //         'bank_name',
    //         'branch_name',
    //         'account_number',
    //         'ifsc_code'
    //     ];
    // }
    

}
