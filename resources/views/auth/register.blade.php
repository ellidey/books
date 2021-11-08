@extends('layouts.app')

@section('content')
<div class="auth">
    <div class="auth__title">Регистрация</div>
    <div class="auth__form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form__item">
                    <label for="name" class="form__label">Имя</label>
                    <input id="name" type="text" class="form__control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="email" class="form__label">Email</label>
                    <input id="email" type="email" class="form__control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="password" class="form__label">Пароль</label>
                    <input id="password" type="password" class="form__control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="password-confirm" class="form__label">Повторите пароль</label>
                    <input id="password-confirm" type="password" class="form__control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form__button">
                    <button type="submit" class="btn">
                        Регистрация
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
