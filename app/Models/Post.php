<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = [];
  protected $with = (['category', 'author']); //default for every post queries
  protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

//  public function getRouteKeyName()
//  {
//    return 'slug';
//  }
  public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
  {
    $query->when($filters['search'] ?? false, fn($query, $search) =>
      $query
        ->where('title', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%'));
  }

  public function category() //category_id
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  { // [user]user_id
    return $this->belongsTo(User::class, 'user_id');
  }

}
