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
                    <div class="info-box has-padding-top-lg has-padding-bottom-lg has-margin-top-md has-margin-bottom-md">
                        <form method="POST" action="{{ route('register') }}">
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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Currency') }}</label>

                                <div class="col-md-6">
                                    <select name="currency" id="" class="form-control  @error('currency') is-invalid @enderror">
                                        @foreach($currencys as $currency)
                                            <option value="{{$currency->id}}">{{$currency->code}}({{$currency->symbol}})</option>
                                        @endforeach
                                    </select>
                                    @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button button-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="is-login-links ta-center">
                        <a href="/login">Sign In</a><span class="has-text-grey-light">•</span>
                        <a href="/password/reset">Forgot Password</a>
                    </p>
                </div>
                <script type="text/javascript">
                    document.getElementById('email').focus();
                </script>
            </div>
        </div>
</section>

@endsection
