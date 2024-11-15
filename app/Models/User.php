<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the jobs for the user.
     */
    protected function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get the bookmarks for the user.
     */
    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class, 'bookmark_user');
    }

    /**
     * Get the bookmarked jobs for the user.
     */
    public function bookmarkedJobs()
    {
        return $this->belongsToMany(Job::class, 'bookmark_user')->withTimestamps();
    }
}
