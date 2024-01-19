<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaticInformation extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'picture_name',
        'content_title_en',
        'content_title_ar',
        'content_en',
        'content_ar',
        'photo',
    ];

    /**
     * Get the admin that owns the StaticInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function photos(): MorphMany
    {
       return $this->morphMany(Photo::class , 'photoable') ;
    }
}
