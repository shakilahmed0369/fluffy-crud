<?php

namespace Modules\LiveChat\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\LiveChat\Database\factories\MessageFactory;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): MessageFactory
    {
        //return MessageFactory::new();
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id')->select('id','name','image');
    }


}
