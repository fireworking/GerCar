<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
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
        return $this->hasMany(Vehicle::class);
    }

    public function colaborators()
    {
        return $this->hasMany(Colaborator::class);
    }

    public function getNameAttribute(){
        return $this->user->name;
    }
}
