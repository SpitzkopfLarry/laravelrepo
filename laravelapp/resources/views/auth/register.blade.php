@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrieren') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                    <form id="register" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addresse') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('error') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span id="availability"></span>
                                
                                @error('error')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Passwort') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Passwort bestätigen') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrieren') }}
                                </button>
                                <button type="button" class="btn btn-warning" id="getRequest">
                                    getRequest
                                </button>
                            </div>
                            
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="getRequestData"></div>
<div id="postRequestData"></div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function(){
        $('#getRequest').click(function(){
            // $.get('getRequest', function(data){
            //    $('#getRequestData').append(data);
            //    console.log(data);
            // });

            $.ajax({
                type: "GET",
                url: "getRequest",
                success: function(data){
                    console.log(data);
                    $('#getRequestData').append(data);
                }
            });
        });

        /*
        $('#register').submit(function(){
            var mail = $('#email').val();
            var username = $('#name').val();

            // $.post('register', { email:mail, name:username}, function(data){
            //    console.log(data);
            //    $('#postRequestData').html(data);
            // });

            var dataString = "Name: "+username+" Email: "+mail;
            $.ajax({
                type:"POST",
                url: "register",
                data: dataString,
                success: function(data){
                    console.log(data);
                    $('#postRequestData').html(data);
                }
            });
        });
        */

    });
</script>
@endsection