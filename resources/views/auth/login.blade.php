@extends('layout')
@section('title', 'Login')

@section('content')
<br><br>
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        Login
                    </p>
                </div>
                <div class="card-content">
                    <div class="content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">E-mail address</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                                    type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Password</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                        <input class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                                type="password" name="password" value="{{ old('email') }}" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    &nbsp;
                                </div>
                                <div class="field-body">
                                    <div class="field is-narrow">
                                        <div class="control">
                                            <label class="checkbox">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button class="button is-link">Login</button>
                                </div>
                                <div class="control">
                                    <a class="button is-text">Forgot your password?</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
