<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class regimen extends Model
{
    protected $table = "regimenes";

    protected $fillable = ['regimen'];
}