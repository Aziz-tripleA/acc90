<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasStatus;

class Number extends BaseModel
{
    use HasFactory,HasStatus;
    protected $guarded = ['id'];
}
