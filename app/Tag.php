<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   
    protected $fillable = ['tag'];

    /*
    |--------------------------------------------------------------------------
    | Eloquent Relationships
    |--------------------------------------------------------------------------
    */

    /**
    * Define an inverse one-to-many relationship.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function posts()
    {
       return $this->belongsToMany(Post::class);
    }
}
