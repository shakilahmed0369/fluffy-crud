<?php

namespace Modules\Wallet\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Wallet\Database\factories\WalletHistoryFactory;
use App\Models\User;

class WalletHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): WalletHistoryFactory
    {
        //return WalletHistoryFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }

}
