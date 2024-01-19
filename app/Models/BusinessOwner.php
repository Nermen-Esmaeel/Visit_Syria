<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessOwner extends Model
{
    use HasFactory;

    /**
     * Get all of the hotels for the BusinessOwner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }


    /**
     * Get all of the restaurants for the BusinessOwner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }


    /**
     * Get all of the sites for the BusinessOwner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites(): HasMany
    {
        return $this->hasMany(TouristSite::class);
    }
}
