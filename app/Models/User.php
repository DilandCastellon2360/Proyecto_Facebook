<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'city',
        'country',
        'profile_photo',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the URL for the user's profile photo.
     *
     * @return string
     */
    public function profilePhotoUrl()
    {
        return $this->profile_photo ? asset('storage/' . $this->profile_photo) : asset('img/default.png');
    }
}
