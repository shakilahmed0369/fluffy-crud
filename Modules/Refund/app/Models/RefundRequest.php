<?php

namespace Modules\Refund\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Refund\Database\factories\RefundRequestFactory;
use Modules\Order\app\Models\Order;
use App\Models\User;

class RefundRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): RefundRequestFactory
    {
        //return RefundRequestFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }

    public function order(){
        return $this->belongsTo(Order::class)->select('id', 'order_id');
    }


}
