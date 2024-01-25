@section('title')
Login
@endsection
@extends('layout.app-no-nav')

@section('content')

<div class="col-12 col-sm-8 col-md-6">
    <form class="form mt-5" action="{{ route('login.check') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">Login</h3>
        <div class="form-group">
            <label for="email" class="text-dark">Email:</label><br>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                        <span class="fs-6 text-danger">
                                 {{ $message }}
                        </span>
                    @enderror
        </div>
        <div class="form-group mt-3">
            <label for="password" class="text-dark">Password:</label><br>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                        <span class="fs-6 text-danger">
                                 {{ $message }}
                        </span>
                    @enderror
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="login">
        </div>
        <div class="text-right mt-2">
            <a href="{{ route('register') }}" class="text-dark">Register here</a>
        </div>
    </form>
</div>

@endsection 