<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsto(User::class,'user_id');
    }
    public function assigned_user()

    {
        return $this->belongsTo(User::class,'assigned_user_id');
    }


}
