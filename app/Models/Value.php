<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasStatus;


class Value extends BaseModel
{
    use HasFactory, HasStatus;
    protected $guarded = ['id'];
}
