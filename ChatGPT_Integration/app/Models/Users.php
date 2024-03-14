<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{
    use HasFactory;

    protected $connection = 'chat_gpt_integration';
    protected $table = 'tbl_users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'remember_token',
    ];
    public function getAuthIdentifierName()
    {
        return 'id'; // Adjust accordingly based on your database column for the unique identifier
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
