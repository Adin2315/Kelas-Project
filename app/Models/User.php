<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function insert_user($uname, $passw){

        return DB::insert("insert into users (Username, Password) values (?, ?)", [$uname, $passw]);
    }
    public function get_user_by_uname($uname){

        return DB::select("select * from users where Username = ?", [$uname]);
    }
}
