<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory, Notifiable;


    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice', 'profile_id');
    }

    public function profile_deduction_types()
    {
        return $this->hasMany('App\Models\ProfileDeductionTypes', 'profile_id');
    }

    public function deductions()
    {
        return $this->hasMany('App\Models\Deduction', 'profile_id');
    }
    public function scopeInvoice($q)
    {
        return $q->leftJoin('invoices', 'profiles.id', '=', 'invoices.profile_id');
    }
}