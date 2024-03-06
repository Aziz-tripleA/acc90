<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends BaseModel
{
    protected $guarded = ['id'];
    use HasFactory;
}
