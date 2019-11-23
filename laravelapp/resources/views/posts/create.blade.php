@extends('layouts.app')

@section('content')
    <h1>Post erstellen</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Titel')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titel eingeben...'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Inhalt')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Text eingeben...'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Bestätigen', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection