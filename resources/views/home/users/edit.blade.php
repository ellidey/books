@extends('layouts.app')

@section('content')
    <div class="create">
        <div class="create__title">Редактирование книги</div>
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form__item">
                <label for="name" class="form__label">Имя</label>
                <input id="name" name="name" type="text" class="form__control" value="{{ $user->name  }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form__item">
                <label for="description" class="form__label">email</label>
                <input id="email" name="email" type="text" class="form__control" value="{{ $user->email  }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__item">
                <label for="image" class="form__label">Пароль</label>
                <input id="password" name="password" class="form__control" type="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__button">
                <button type="submit" class="btn">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
@endsection
