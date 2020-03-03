@extends('layouts.app')

    @section('content')
        <div class="text-center">
            <h2>文章列表</h2>
        </div>
        <hr>
        @foreach($posts as $post)
            <div class="text-center">
                <a href="{{route('posts.show', $post->id)}}">
                    {{$post->title}}
                </a>
                <div>{{$post->published_at->diffForHumans()}}</div>
            </div>
            <hr>
        @endforeach
        <div class="container text-center">
            {{$posts->links()}}
        </div>

        @endsection
