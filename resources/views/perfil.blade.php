@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">Mi cuenta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perfil.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email }}" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div align="center">
                        <label for="name" class="text-md-center">Actualmente usted es {{ auth()->user()->rol }}</label>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-20">
                                    <div class="card">

                                        <div class="card-header">Cambiar contraseña</div>

                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <label for="oldpass" class="col-md-4 col-form-label text-md-left">{{ __('Old password') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="oldpass" type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass">

                                                        @error('oldpass')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('New password') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm new password') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div align="center">

                            @if(session()->has('success'))

                            <div class="alert alert-success" role="alert">{{session('success')}}</div>

                           

                           @endif
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save changes') }}
                            </button>
                        </div>

                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
