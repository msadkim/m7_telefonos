@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user() != null && Auth::user()->isAdmin()) <a
                href="{{route('posts.create')}}" class="btn btn-success">Create</a>
            @endif
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                    @foreach ($posts as $post)
                    <p>
                        @if(Auth::user() != null && Auth::user()->isAdmin()) <a
                            href="{{route('posts.edit',$post->id    )}}" class="btn btn-success">Edit</a>
                        <a class="btn btn-danger"
                            href="{{ route('posts.show',$post->id   )}}"
                            onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$post->id}}').submit();">
                            Delete</a> 
                        @endif 
                            <a href="{{route('posts.show',$post->id )}}">
                            {{ $post->titol }}</a>

                    </p>

                    <form id="delete-form-{{$post->id}}"
                        action="{{ route('posts.delete',$post->id) }}" method="POST"
                        style="display: none;">
                        @csrf<input type="hidden" name="_method" value="DELETE">
                    </form>
                    @endforeach

                </div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
