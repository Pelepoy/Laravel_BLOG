<?php
/**
  * ROUTE (|'/')
  $files = File::files(resource_path("posts"));
  $posts = [];
  foreach ($files as $file) {
  $documents = YamlFrontMatter::parseFile($file);
  $posts[] = new Post(
  $documents->title,
  $documents->excerpt,
  $documents->date,
  $documents->body(),
  $documents->slug
  );
  }
*/
/**
 ROUTE ('posts')
 if (!file_exists($path = resource_path("posts/{$slug}.html"))) { // checks if the file exits
 // abort(404);
 throw new ModelNotFoundException();
 }

 return cache()->remember("post.{slug}", 1200, fn () => file_get_contents($path)); // Read the content from the HTML
 file witch caching
 }
*/
/**
 // $post = null; // Initialize the post variable
 // // Find the file for the post with the given slug
 // $file = resource_path("posts/{$slug}.html");

 // if (file_exists($file)) {
 // $documents = YamlFrontMatter::parseFile($file);
 // $post = new Post(
 // $documents->title,
 // $documents->excerpt,
 // $documents->date,
 // $documents->body(),
 // $documents->slug
 // );
 // }

 // if (!$post) {
 // abort(404);
 // }
*/
/**
 Route::get('/user/{id}/{group}', function($id, $group){
   return response($id.'-'.$group, 200);
 });

 Route::get('/request-json', function(){
   return response()->json(["name" => "Pekommamushi", "age" => "22", "address" => "God Valley"]);
 });

Route::get('/request-download', function(){
  $path = public_path().'/sicmundus.html';
  $name = 'testing.html';
  $header = [
    'Content-type: application/text-plain',
  ];
  return response()->download($path, $name, $header);
});
*/

/* * CACHING

return cache()->rememberForever('posts.all', function () {
  return collect(File::files(resource_path("posts")))
    ->map(fn($file) => YamlFrontMatter::parseFile($file))
    ->map(fn($document) => new Post(
      $document->title,
      $document->excerpt,
      $document->date,
      $document->body(),
      $document->slug
    ))
    ->sortByDesc('date'); // Descending
  // ->sortBy('date'); //Ascending
});

 */
/* *ex. Blade condition
 <article class="{{ $loop->even ? 'foorbar' : '' }}">
@if (true)
@endif
-
@foreach
@endeach
-
@unless
@endunless
 */


/* *Route::get
 Route::get('posts/{slug}', function ($slug) {

  return view('post', [
    'post' => Post::findOrFail($slug)
  ]);
})->where('slug', '[A-Za-z\-]+');

*/

/* *Post.php Model Logic -> App/Models/Post.php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
  public function __construct(
    public string $title,
    public string $excerpt,
    public int    $date,
    public string $body,
    public string $slug
  )
  {
  }

  public static function all()
  {

    return collect(File::files(resource_path("posts")))
      ->map(fn($file) => YamlFrontMatter::parseFile($file))
      ->map(fn($document) => new Post(
        $document->title,
        $document->excerpt,
        $document->date,
        $document->body(),
        $document->slug
      ))
      ->sortByDesc('date'); // Descending
    // ->sortBy('date'); //Ascending

  }

  public static function find($slug)
  {
    return static::all()->firstWhere('slug', $slug);
  }

  public static function findOrFail($slug)
  {
    $post = static::find($slug);
    if (!$post) {
      throw new ModelNotFoundException();
    }
    return $post;
  }
}
*/
/* *  Route get for specific post
Route::get('posts/{slug}', function ($id) {

  return view('post', [
    'post' => Post::findOrFail($id)
  ]);
});

* for auto finding route through model binding
Route::get('posts/{post}', function (Post $post) { // route model binding

  return view('post', [
    'post' => $post
  ]);
});


*  Post.php
   public function getRouteKeyName()
  {
    return 'slug';
  }
----------------------
  public function category()
  {
    // hasOne, hasMany, belongsTo, belongsToMany
  }
* SQL Operation / Debugging
 \Illuminate\Support\Facades\DB::listen(function($query){
   logger($query->sql, $query->bindings);
 });
* Route ('/')
Route::get('/', function () {
  return view('posts', [
    'posts' => Post::all()
  ]);
});

* Route::get('/', function () {
  return view('posts', [
    'posts' => Post::latest()->with('category')->get()
  ]);
});


* Database Seeder Scratch wihtout factory
//    $user = User::factory()->create();
//
//     \App\Models\User::factory()->create([
//         'name' => 'Test User',
//         'email' => 'test@example.com',
//     ]);
//
//    $personal = Category::create([
//      'name' => 'Personal',
//      'slug' => 'personal'
//    ]);
//
//    $family = Category::create([
//      'name' => 'Family',
//      'slug' => 'family'
//    ]);
//
//    $work = Category::create([
//      'name' => 'Work',
//      'slug' => 'work'
//    ]);
//
//    Post::create([
//      'user_id' => $user->id,
//      'category_id' => $family->id,
//      'title' => 'My Family Post',
//      'slug' => 'my-first-post',
//      'excerpt' => 'Sic Mundus Creatus Est',
//      'body' => 'Etiam quis ligula elementum nulla vestibulum facilisis sit amet nec ipsum. Donec vel velit eleifend, posuere dolor imperdiet, feugiat tellus. Vestibulum nec congue est. Donec dictum pellentesque egestas. Ut dignissim commodo tempus. Nullam eu nisi odio. Proin laoreet iaculis nisi vel ultrices. Aliquam lobortis id tortor sit amet imperdiet.'
//    ]);
//
//    Post::create([
//      'user_id' => $user->id,
//      'category_id' => $work->id,
//      'title' => 'My Work Post',
//      'slug' => 'my-second-post',
//      'excerpt' => 'Sic Mundus Creatus Est',
//      'body' => 'Etiam quis ligula elementum nulla vestibulum facilisis sit amet nec ipsum. Donec vel velit eleifend, posuere dolor imperdiet, feugiat tellus. Vestibulum nec congue est. Donec dictum pellentesque egestas. Ut dignissim commodo tempus. Nullam eu nisi odio. Proin laoreet iaculis nisi vel ultrices. Aliquam lobortis id tortor sit amet imperdiet.'
//    ]);

** WITH ()
* Route::get('/', function () {
  return view('posts', [
    'posts' => Post::latest()->with(['category','author'])->get()
  ]);
});

* Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', post)->firstOrFail [route model binding]
  return view('post', [
    'post' => $post
  ]);
});

* Route::get('categories/{category:slug}', function (Category $category ){
  return view('posts', [
    'posts' => $category->posts->load(['category','author'])
  ]);
});

* Route::get('authors/{author:username}', function (User $author){
  return view('posts', [
    'posts' => $author->posts->load(['category','author'])
  ]);
});

*Route::get('/', function () {

  return view('posts', [
    'posts' => Post::latest()->get(),
    'categories' => Category::all()
  ]);
})->name('home');

    $posts = Post::latest();

    if (request('search')) {
      $posts
        ->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('body', 'like', '%' . request('search') . '%');
    }
    return $posts->get();

* Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', post)->firstOrFail [route model binding]
  return view('post', [
    'post' => $post
  ]);
});



*/













