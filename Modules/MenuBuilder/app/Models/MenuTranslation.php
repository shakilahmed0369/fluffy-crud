<?php

namespace Modules\MenuBuilder\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MenuBuilder\Database\factories\MenuTranslationFactory;

class MenuTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title'];
}
