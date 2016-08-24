<?php

namespace RDuuke\Newbie\App\Models;

use Illuminate\Database\Eloquent\Model;
class Users extends Model
{
    protected  $table = 'users';

    protected $fillable = ['email', 'name', 'password', 'rol'];
}