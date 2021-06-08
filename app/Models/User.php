<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const MALE = 1;
    public const FEMALE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'surname',
        'phone',
        'avatar',
        'sex',
        'agree_email_notify',
        'experience'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getSexTitle()
    {
        return optional(
            self::genders()
                ->where('id', $this->sex)
            )->title;
    }

    public static function genders()
    {
        return collect([
            [
                'id' => self::MALE,
                'title' => 'Мужской'
            ],
            [
                'id' => self::FEMALE,
                'title' => 'Женский'
            ]
        ]);
    }

    public static function getExperience($userId)
    {
        $user = User::find($userId);
        return optional($user)->experinece;
    }
}
