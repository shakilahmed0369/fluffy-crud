<?php

namespace Modules\Order\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\OrderFactory;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }
}
