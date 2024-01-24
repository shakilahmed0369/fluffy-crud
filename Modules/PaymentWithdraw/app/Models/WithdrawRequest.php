<?php

namespace Modules\PaymentWithdraw\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PaymentWithdraw\Database\factories\WithdrawRequestFactory;
use App\Models\User;

class WithdrawRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): WithdrawRequestFactory
    {
        //return WithdrawRequestFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }
}
