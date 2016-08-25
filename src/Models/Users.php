<?php

namespace RDuuke\Newbie\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['email', 'name', 'password', 'rol'];
}
