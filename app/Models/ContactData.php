<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactData extends BaseModel
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function scopeFindByType($query, $type)
    {
        return $query->where('title', $type)->first();
    }

    public function getLabelAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->title));
    }
}
