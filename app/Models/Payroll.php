<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table = 'payrolls';

    public $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'employer_id',
        'joining_date',
        'leaving_date'
    ];
    public function Employee(){
        return $this->belongsTo(Employee::class);
    }
    public function Employer(){
        return $this->belongsTo(Employer::class);
    }
}
