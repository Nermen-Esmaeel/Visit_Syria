<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Favorite extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',

    ];


    /**
     * Get the user that owns the Favorite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritable(): MorphTo
    {
        return $this->morphTo();

    }



    public function toggle()
    {           dd($this);

        if ($this->exists()) {
           dd($this->exists());
            //$this->delete();
           // return false;
        } else {
            //$this->save();
            //return true;
            dd(false);

        }
    }
}
