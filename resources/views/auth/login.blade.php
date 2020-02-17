@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <form class="edit-form" action="{{ route('login') }}" method="post">
                @csrf
                <h2 class="login-title">Login</h2>
                <label for="email" class="">{{ __('E-Mail/Username') }}</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                <div class="clearfix"></div>
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" class="" name="password" value="" required>

                @error('email')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection
