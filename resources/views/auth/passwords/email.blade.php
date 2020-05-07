@extends('layouts.app')

@section('content')
    <section class="hero bs-border-box is-login is-fullheight">
        <div class="hero-body">
            <div class="has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="logo ta-center ptb-4">
                        <a class="brand-text" href="/">{{env('MIX_APP_NAME')}}<span class="suffix">{{env('MIX_APP_SUFFIX')}}</span></a>
                    </div>
                    <div
                        class="info-box has-padding-top-lg has-padding-bottom-lg has-margin-top-md has-margin-bottom-md">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    document.getElementById('email').focus();
                </script>
            </div>
        </div>
    </section>
@endsection
