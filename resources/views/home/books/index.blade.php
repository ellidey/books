@extends('layouts.app')

@section('content')
    <div class="table">
        <div class="create-new"><a href="{{ route('books.create') }}" class="btn">Создать новую</a></div>
        <div class="table-header">
            <div class="header__item">Название</div>
            <div class="header__item">Описание</div>
            <div class="header__item">Автор</div>
            <div class="header__item">Категория</div>
            <div class="header__item">Взаимодействие</div>
        </div>
        <div class="table-content">
            @foreach ($books as $book)
                <div class="table-row">
                    <div class="table-data">{{ $book->name }}</div>
                    <div class="table-data">{{ mb_substr($book->description, 0, 32) }}...</div>
                    <div class="table-data">{{ $book->user->name }}</div>
                    <div class="table-data">{{ $book->category->name }}</div>
                    <div class="table-data">
                        <a href="{{ route('books.edit', $book) }}" class="btn">Редактировать</a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline-block">
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
