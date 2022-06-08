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
    protected $rememberTokenName = false;

    const TYPE_READER = 0;
    const TYPE_ADMINISTRATOR = 1;
    const TYPE_WRITER = 2;

    const NAME_TYPE_ADMINISTRATOR = 'Администратор';
    const NAME_TYPE_READER = 'Читатель';
    const NAME_WRITER = 'Писатель';

    const TYPES = [
        self::TYPE_ADMINISTRATOR => self::NAME_TYPE_ADMINISTRATOR,
        self::TYPE_READER => self::NAME_TYPE_READER,
        self::TYPE_WRITER => self::NAME_WRITER,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
