<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;


    /**
     * Get all of the comments for the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }


    /**
     * Get all of the comments for the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function staticInformation(): HasMany
    {
        return $this->hasMany(StaticInformation::class);
    }


    
}
