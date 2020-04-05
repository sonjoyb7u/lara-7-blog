<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status',
    ];

    protected $hidden = [
        'slug',
    ];

    public function posts() {
        $this->hasMany(Post::class, 'cat_id', 'id');
    }


}
