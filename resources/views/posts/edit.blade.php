@extends('layouts.app')

    @section('content')
        <div class="container">
            <div  class="text-center">
                <h2>部 落 格</h2>
            </div>
            <hr>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <form action="{{route('posts.update', $post->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT"/>
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="body" class="control-label">Content:</label>
                    <textarea id="body" name="body" class="form-control" rows="10">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <label for="published_at" class="control-label">Post Date:</label>
                    <input id="published_at" name="published_at" type="date" class="form-control" value="{{$post->published_at->toDateString()}}">
                </div>

                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>

            </form>

        </div>
        @endsection
