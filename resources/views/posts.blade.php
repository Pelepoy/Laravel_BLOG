<x-layout>

  @include('/partials/_post-header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
  @if($posts->count())
   <x-posts-grid :posts="$posts" />
  @else
      <p class="text-center font-bold text-blue-400">Ahh uhh...Someone's brewing. Please check back later, Lad.</p>
  @endif


{{--    <div class="lg:grid lg:grid-cols-3">--}}
{{--      <x-post-card />--}}
{{--      <x-post-card />--}}
{{--      <x-post-card />--}}
{{--    </div>--}}
  </main>

  {{--  @foreach ($posts as $post)--}}
{{--    <article>--}}
{{--      <h1>--}}
{{--        <a href="/posts/{{ $post->slug}}">--}}
{{--          <em>--}}
{{--            {{$post->title}}--}}
{{--          </em>--}}
{{--        </a>--}}
{{--      </h1>--}}
{{--      <p>--}}
{{--        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>--}}
{{--      </p>--}}
{{--      <div>--}}
{{--        <p>{{$post->excerpt}}</p>--}}
{{--      </div>--}}
{{--    </article>--}}
{{--  @endforeach--}}
</x-layout>
