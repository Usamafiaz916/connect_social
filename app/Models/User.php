<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function Symfony\Component\Translation\t;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function roles(){
        return $this->belongsTo(Role::class,'role')->withDefault();
    }
    protected $fillable = [
        'fname',
        'lname',
        'role',
        'phone',
        'gender',
        'username',
        'country_code',
        'email',
        'password',
        'email_code',
        'phone_code',
        'profile',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function fullName(){
        return $this->fname.' '.$this->lname;
    }
    public function details(){
        if ($this->roles->slug=='ambassador'){
            return $this->belongsTo(AmbassadorDetails::class,'id','user_id');
        }
    }
}
