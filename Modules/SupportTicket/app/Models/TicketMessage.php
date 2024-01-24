<?php

namespace Modules\SupportTicket\app\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SupportTicket\Database\factories\TicketMessageFactory;

class TicketMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['unseen_admin'];
    public function admin()
    {
        return $this->belongsTo(Admin::class)->select('id', 'name');
    }

    public function documents()
    {
        return $this->hasMany(MessageDocument::class);
    }
}
