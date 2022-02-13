<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','zone_code','nic','address','mobile','email','gender','territtory_code','user_name','passwords'];
}
