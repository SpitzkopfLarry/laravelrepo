@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-dark btn-default">Zurück</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Erstellt: {{$post->created_at}} von {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <!-- <a href="/posts/{{$post->id}}/edit" class="btn btn-info btn-default">Bearbeiten</a> -->

            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <!-- edit button -->
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info">Bearbeiten</a>
                <!-- delete button -->
                    <button type="submit" class="btn btn-danger float-right">Löschen</button>
            </form>
        @endif
    @endif
    
@endsection