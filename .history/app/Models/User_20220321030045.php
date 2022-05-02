<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function typeable()
    {
        return $this->morphTo();
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, ['owner']);
    }

    //companies

    public function getColaboratorsAttribute(){
        return $this->typeable->colaborators;
    }

    public function getCnpjAttribute(){
        return $this->typeable->cnpj;
    }

    public function getStateAttribute(){
        return $this->typeable->state;
    }

    public function getCityAttribute(){
        return $this->typeable->city;
    }

    //colaborators

    public function getCompanyIdAttribute(){
        return $this->typeable->company_id;
    }

    public function getCompanyAttribute(){
        return $this->typeable->company;
    }

    public function getBirthDateAttribute(){
        return $this->typeable->birth_date;
    }

    public function getCpfAttribute(){
        return $this->typeable->cpf;
    }

    public function getPhoneNumberAttribute(){
        return $this->typeable->birth_date;
    }

}
