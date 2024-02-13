<?php
namespace Modules\Testimonial\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'review', 'status', ];
}
