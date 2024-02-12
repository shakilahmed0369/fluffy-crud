<?php
namespace Modules\ProductCategory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HelloWorld extends Model
{
    use HasFactory;

    protected $fillable = ['category', ];
}
