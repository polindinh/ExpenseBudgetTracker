@extends('layouts.app')

@section('content')
<section class="hero bs-border-box is-login is-fullheight">
        <div class="hero-body">
            <div class="has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="logo ta-center ptb-4">
                        <a class="brand-text" href="/">{{env('MIX_APP_NAME')}}<span class="suffix">{{env('MIX_APP_SUFFIX')}}</span></a>
                    </div>
                    <h3 class="mt-5 fs-3 ta-center fw-semibold">Sign in with your email and password.</h3>
                    <div
                        class="info-box has-padding-top-lg has-padding-bottom-lg has-margin-top-md has-margin-bottom-md">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="button button-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="has-text-grey is-login-links ta-center">
                        <a href="/signup" class="has-text-grey">Sign up</a><span
                            class="has-text-grey-light">•</span>
                        <a href="/password/reset" class="has-text-grey">Forgot Password</a>
                    </p>
                </div>
                <script type="text/javascript">
                    document.getElementById('email').focus();
                </script>
            </div>
        </div>
    </section>
@endsection
