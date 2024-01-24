<?php

namespace Modules\BasicPayment\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\BasicPayment\Database\factories\BasicPaymentFactory;

class BasicPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): BasicPaymentFactory
    {
        //return BasicPaymentFactory::new();
    }
}
