@extends('layouts.app')

@section('content')
    <div class="table">
        <div class="create-new"><a href="{{ route('categories.create') }}" class="btn">Создать нового</a></div>
        <div class="table-header">
            <div class="header__item">Название</div>
            <div class="header__item">Дата Создания</div>
            <div class="header__item">Дата Изменения</div>
            <div class="header__item">Взаимодействие</div>
        </div>
        <div class="table-content">
            @foreach ($categories as $category)
                <div class="table-row">
                    <div class="table-data">{{ $category->name }}</div>
                    <div class="table-data">{{ $category->created_at }}</div>
                    <div class="table-data">{{ $category->updated_at }}</div>
                    <div class="table-data">
                        <a href="{{ route('categories.edit', $category) }}" class="btn">Редактировать</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
