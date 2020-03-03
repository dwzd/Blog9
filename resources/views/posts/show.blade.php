@extends('layouts.app')

    @section('content')
        <div class="container">
            <h2 class="text-center text-success">{{$post->title}}</h2>
            <hr/>
            <span class="float-left">{{$post->author->name}}</span>
            <span class="float-right">{{$post->published_at->diffForHumans()}}</span>
            <div class="clearfix"></div>
            <hr/>
            <p>{{$post->body}}</p>
            <div class="float-left">
                <a href="{{route('posts.edit', $post->id)}}">
                    Edit your Blog
                </a>
            </div>
            <div class="float-right">
                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <div class="form-group">
                        <button type="submit">Delete this Blog</button>
                    </div>
                </form>
            </div>





        @endsection
