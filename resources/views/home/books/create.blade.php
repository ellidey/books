@extends('layouts.app')

@section('content')
    <div class="create">
        <div class="create__title">Создание книги</div>
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form__item">
                <label for="name" class="form__label">Название</label>
                <input id="name" name="name" type="text" class="form__control">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form__item">
                <label for="description" class="form__label">Описание</label>
                <textarea id="description" name="description" type="text" class="form__control form__area"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__item">
                <label for="image" class="form__label">Изображение</label>
                <input id="image" name="image" class="form__control" type="file">
                @error('image')
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
