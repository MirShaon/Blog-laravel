<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
   
    protected $fillable =[
        'title',
        'body',
        'category_id',
        'featured',
        'slug',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | Eloquent Accessors and Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * @param  $featured
     * @return string
     */
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    /*
    |--------------------------------------------------------------------------
    | Eloquent Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Define an inverse one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    /**
     * Define an inverse one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    /**
     * Define an inverse one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
