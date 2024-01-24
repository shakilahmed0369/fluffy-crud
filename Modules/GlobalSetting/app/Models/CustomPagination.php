<?php

namespace Modules\GlobalSetting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\GlobalSetting\Database\factories\CustomPaginationFactory;

class CustomPagination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): CustomPaginationFactory
    {
        //return CustomPaginationFactory::new();
    }
}
