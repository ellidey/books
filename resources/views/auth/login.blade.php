@extends('layouts.app')

@section('content')
<div class="auth">
    <div class="auth__title">Авторизация</div>
    <div class="auth__form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form__item">
                <label for="email" class="form__label">Email</label>
                <input id="email" type="email" class="form__control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__item">
                <label for="password" class="form__label">Пароль</label>
                <input id="password" type="password" class="form__control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__button">
                <button type="submit" class="btn">
                    Войти
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
