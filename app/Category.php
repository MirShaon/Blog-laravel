<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * Define an inverse many-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   public function posts()
   {
      return $this->hasMany(Post::class);
   }
}
