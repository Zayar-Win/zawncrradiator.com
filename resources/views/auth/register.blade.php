@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 80px;">
        <div class="col-md-8">
            <div class="card" style=" padding-top:30px;padding-bottom: 30px; border-radius: 40px;">
               

                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row pb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                <strong style="color: rgb(95, 44, 130);"> {{ __('Name') }}</strong></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <strong style="color: rgb(95, 44, 130);">{{ __('E-Mail Address') }}</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <strong style="color: rgb(95, 44, 130);">{{ __('Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <strong style="color: rgb(95, 44, 130);">{{ __('Confirm Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    

                    


                        <div class="form-group row mb-0 pb-4">
                            <div class="col-md-6 offset-md-4  text-center">
                                <button type="submit" style="background: rgb(95, 44, 130); border-radius: 20px;" class="btn text-white px-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
