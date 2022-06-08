@extends('layouts.app')

@section('content')
    <div class="create">
        <div class="create__title">Редактирование категории</div>
        <form method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form__item">
                <label for="name" class="form__label">Название</label>
                <input id="name" name="name" type="text" class="form__control" value="{{ $category->name  }}">
                @error('name')
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
