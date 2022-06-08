@extends('layouts.app')

@section('content')
    <div class="create">
        <div class="create__title">Создание пользователя</div>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form__item">
                <label for="name" class="form__label">Имя</label>
                <input id="name" name="name" type="text" class="form__control">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form__item">
                <label for="email" class="form__label">email</label>
                <input id="email" name="email" type="email" class="form__control">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__item">
                <label for="password" class="form__label">Пароль</label>
                <input id="password" name="password" class="form__control" type="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__button">
                <button type="submit" class="btn">
                    Создать
                </button>
            </div>
        </form>
    </div>
@endsection
