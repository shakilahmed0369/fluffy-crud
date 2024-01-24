<?php

namespace Modules\ClubPoint\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClubPoint\Database\factories\ClubPointHistoryFactory;
use Modules\Order\app\Models\Order;
use App\Models\User;

class ClubPointHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): ClubPointHistoryFactory
    {
        //return ClubPointHistoryFactory::new();
    }


    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }

    public function order(){
        return $this->belongsTo(Order::class)->select('id', 'order_id', 'order_status', 'payment_status');
    }



}
