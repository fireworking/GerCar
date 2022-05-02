<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Colaborator extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function user()
    {
        return $this->morphOne(User::class, 'typeable');
    }

    public function company()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute(){
        return $this->user->name;
    }
}
