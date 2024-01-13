<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TouristSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'title-EN',
        'title-AR',
        'rating',
        'description-EN',
        'description-AR',
        'email'
    ];

     /**
     * Get the businessOwner that owns the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessOwner(): BelongsTo
    {
        return $this->belongsTo(BusinessOwner::class, 'business_owner_id');
    }

    public function favorites():MorphMany
    {

        return $this->morphMany(Favorite::class , 'favoritable') ;
    }
    
    /**
     * Get all of the locations for the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }


     /**
     * Get all of the reservations for the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function photos(): MorphMany
    {
       return $this->morphMany(Photo::class , 'photoable') ;
    }

    public function comments(): MorphMany
    {
       return $this->morphMany(Comment::class , 'commentable') ;
    }

     /**
     * Get the city that owns the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(city::class, 'city_id');
    }

}
