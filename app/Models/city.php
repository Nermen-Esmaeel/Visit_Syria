<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class city extends Model
{
    use HasFactory;

    /**
     * Get all of the blogs for the city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
    /**
     * Get all of the hotels for the city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }

    /**
     * Get all of the restaurants for the city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }

    /**
     * Get all of the sites for the city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites(): HasMany
    {
        return $this->hasMany(TouristSite::class);
    }
}
