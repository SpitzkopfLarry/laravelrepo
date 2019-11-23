@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Willkommen!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Post erstellen</a>
                    <h3>Deine Blog Posts<h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Titel</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Bearbeiten</a></td>
                                    <td><form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- delete button -->
                                                <button type="submit" class="btn btn-danger float-right">Löschen</button>
                                        </form></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <small>Du hast keine Posts!</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
