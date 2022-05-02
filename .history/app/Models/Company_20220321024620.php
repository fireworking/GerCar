<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function user()
    {
        return $this->morphOne(User::class, 'typeable');
    }

    public function vehicles()
    {
        return $this->user->;
    }

    public function colaborators()
    {
        return $this->hasMany(User::class);
    }

    public function getNameAttribute(){
        return $this->user->name;
    }
}
