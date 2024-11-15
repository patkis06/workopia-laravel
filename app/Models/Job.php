<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'listings';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'tags',
        'job_type',
        'remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zipcode',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_logo',
        'company_website',
    ];

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to bookmarks
    public function bookmarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }
}
