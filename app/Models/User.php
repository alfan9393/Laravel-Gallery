<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'UserID';
    public $timestamps = false;

    protected $fillable = [
        'Username',
        'Password',
        'Email',
        'NamaLengkap',
        'Alamat',
        'role'
    ];
}