<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'custom_option_id'
    ];
}
