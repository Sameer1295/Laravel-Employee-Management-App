<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    public $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gender',
        'designation',
        'education',
        'email',
        'mobile_number',
        'present_address',
        'permanent_address',
        'date_of_birth',
        'mother_name',
        'father_name',
        'uan_number',
        'esic_number',
        'adhaar_number',
        'pan_number',
        'blood_group',
        'body_mark',
        'bank_name',
        'branch_name',
        'account_number',
        'ifsc_code'
    ];
    public function Payroll(){
        return $this->hasMany(Payroll::class);
    }
}
