@extends('layouts.app')

    @section('content')
        <div class="container">
            <h2 class="text-center">Create new Blog:</h2>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            <form action="{{route('posts.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body" class="control-label">Content:</label>
                    <textarea id="body" name="body" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at" class="control-label">Post Date:</label>
                    <input id="published_at" name="published_at" type="date" class="form-control" value="{{date('Y-m-d')}}">
                </div>

                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>



        @endsection
