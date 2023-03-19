<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDeductionTypes extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id');
    }

    public function deduction_type()
    {
        return $this->belongsTo('App\Models\DeductionType', 'deduction_type_id');
    }

    public function deductions()
    {
        return $this->hasMany('App\Models\Deduction', 'profile_deduction_type_id');
    }
}
