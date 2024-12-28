<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 



class Conversation extends Model
{
    use HasFactory;

    protected $fillable=[
        'receiver_id',
        'sender_id'
    ];

    // public function messages()
    // {
    //     return $this->hasMany(Message::class);
    // }

    // public function sender()
    // {
    //     return $this->belongsTo(User::class, 'sender_id');
    // }

    // public function receiver()
    // {
    //     return $this->belongsTo(User::class, 'receiver_id');
    // }

    public function getReceiver()
    {

        if ($this->sender_id === Auth::id()) {

            return User::firstWhere('id',$this->receiver_id);

        } else {

            return User::firstWhere('id',$this->sender_id);
        }
        

    }
    
}
