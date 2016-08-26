<?php

namespace RDuuke\Newbie\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Users.
 */
class Users extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * @var array
     */
    protected $fillable = ['email', 'name', 'password', 'rol'];
}
