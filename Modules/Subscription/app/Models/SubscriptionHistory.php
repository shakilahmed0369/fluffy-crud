<?php

namespace Modules\Subscription\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subscription\Database\factories\SubscriptionHistoryFactory;
use App\Models\User;

class SubscriptionHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): SubscriptionHistoryFactory
    {

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
