@extends('layouts.app')
@section('content')
<div class="categories">
    @foreach($categories as $cat)
        @isset($category)
            <a class="{{ $cat == $category ? 'active' : '' }}" href="{{ route('category', $cat->id) }}">{{ $cat->name }}</a>
        @else
            <a href="{{ route('category', $cat->id) }}">{{ $cat->name }}</a>
        @endisset
    @endforeach
</div>
<div class="books">
    @foreach($books as $book)
        <div class="books__item">
            <div class="books__item-image">
                <img src="{{ asset('img/books/' . $book->image) }}" alt="">
            </div>
            <div class="books__item-name">{{ $book->name }}</div>
            <div class="books__item-descript">{{ mb_substr($book->description, 0, 32) }}...</div>
            <div class="books__item-buttom"><a href="{{ route('book', $book->id) }}" class="btn">Подробнее</a></div>
        </div>
    @endforeach
</div>
@endsection
