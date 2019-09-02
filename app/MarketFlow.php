<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketFlow extends Model
{
    protected $fillable = ['period','domestic', 'foreign', 'total_ft_naira', 'total_ft_dollar'];
}
