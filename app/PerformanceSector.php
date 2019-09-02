<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceSector extends Model
{

    protected $fillable = ['industry_sector', 'change', 'transaction_naira', 'naira_units', 'transaction_dollar', 'usd_units'];
}
