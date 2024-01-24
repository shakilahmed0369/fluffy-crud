<?php

namespace Modules\PageBuilder\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageItemComponents extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
    ];
}
