@extends('layouts.app')

@section('content')
    <div class="create">
        <div class="create__title">Создание категории</div>
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
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

            <div class="form__button">
                <button type="submit" class="btn">
                    Создать
                </button>
            </div>
        </form>
    </div>
@endsection
