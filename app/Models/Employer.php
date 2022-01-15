<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';

    public $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'mobile_number',
        'address',
        'pf_number',
        'esic_number',
        'gst_number'
    ];
}
