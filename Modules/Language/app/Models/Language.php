<?php

namespace Modules\Language\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'direction',
        'status',
        'is_default',
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = str_replace(' ', '-', strtolower($value));
    }
}
