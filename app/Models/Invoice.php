<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id');
    }

    public function deductions()
    {
        return $this->hasMany('App\Models\Deduction', 'invoice_id');
    }

    public function invoice_items()
    {
        return $this->hasMany('App\Models\InvoiceItems', 'invoice_id');
    }
}