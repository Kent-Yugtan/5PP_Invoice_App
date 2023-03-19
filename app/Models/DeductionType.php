<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile_deduction_types()
    {
        return $this->hasMany('App\Models\ProfileDeductionTypes', 'deduction_type_id');
    }
}