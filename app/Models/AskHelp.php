<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskHelp extends BaseModel
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $casts = [
    //     'has_previous_help' => 'boolean'
    // ];

    public function type()
    {
        return $this->belongsTo(CounselingType::class);
    }
}
