<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceCapitalization extends Model
{
    protected $fillable = ['capitalization', 'change', 'transaction_naira', 'naira_units', 'transaction_dollar', 'usd_units'];

}
