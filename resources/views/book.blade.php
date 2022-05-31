@extends('layouts.app')

@section('content')
    <div class="book">
        <div class="book__left">
            <div class="book__image">
                <img src="{{ asset('img/books/' . $book->image) }}">
            </div>
            <div class="book__return">
                <a href="/" class="btn">Назад</a>
            </div>
        </div>
        <div class="book__right">
            <div class="book__name">{{ $book->name }}</div>
            <div class="book__description">{{ $book->description }}</div>
        </div>
    </div>
@endsection
